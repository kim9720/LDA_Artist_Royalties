<?php

// app/Http/Controllers/MusicController.php
namespace App\Http\Controllers;

use App\Models\AudioFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use getID3;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Container\Attributes\Log;

class MusicController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'music.*' => 'required|file|mimes:mp3,wav,aac,ogg,flac|max:20480',
            'song_title' => 'required|string|max:255',
            'isrc_code' => 'nullable|string|max:12',
        ]);

        $uploadedFiles = [];
        $errors = [];

        if ($request->hasFile('music')) {
            foreach ($request->file('music') as $file) {
                try {
                    // Generate safe filename
                    $originalName = $file->getClientOriginalName();
                    $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', pathinfo($originalName, PATHINFO_FILENAME))
                        . '.' . $file->extension();

                    $path = $file->storeAs('/music', time() . '_' . $safeName);
                    $fullPath = str_replace('/', '\\', Storage::path($path));

                    if (!Storage::exists($path)) {
                        throw new \Exception("File storage failed: {$path}");
                    }

                    $fingerprint = $this->generateFingerprint($fullPath);
                    $newHash = hash('sha256', $fingerprint);
                    if (!$fingerprint) {
                        Storage::delete($path);
                        throw new \Exception("Fingerprint generation failed");
                    }

                    if (AudioFile::where('fingerprint_hash', $newHash)->exists()) {
                        Storage::delete($path);
                        \Log::error("iyo ipo");
                        $errors[] = "{$originalName} Is already been uploaded";
                        continue;
                    }

                    $getID3 = new \getID3;
                    $fileInfo = $getID3->analyze($fullPath);

                    $audioFile = AudioFile::create([
                        'user_id' => auth()->id(),
                        'filename' => basename($path),
                        'original_name' => $originalName,
                        'path' => $path,
                        'file_size' => $this->formatBytes($file->getSize()),
                        'duration' => $fileInfo['playtime_string'] ?? null,
                        'fingerprint' => $fingerprint,
                        'fingerprint_hash' => $newHash,
                        'song_title' => $request->song_title,
                        'isrc_code' => $request->isrc_code,
                        'mime_type' => $file->getMimeType(),
                        'bitrate' => $fileInfo['audio']['bitrate'] ?? null,
                        'sample_rate' => $fileInfo['audio']['sample_rate'] ?? null,
                    ]);

                    $uploadedFiles[] = $audioFile;
                } catch (\Exception $e) {
                    \Log::error("Audio upload error: " . $e->getMessage(), [
                        'file' => $originalName ?? 'unknown',
                        'trace' => $e->getTraceAsString()
                    ]);
                    $errors[] = "Failed to upload {$originalName}: " . $e->getMessage();
                }
            }
        }

        $response = back();

        if (!empty($uploadedFiles)) {
            $response = $response->with([
                'success' => count($uploadedFiles) . ' file(s) uploaded successfully!',
                'uploaded_files' => $uploadedFiles // Make sure this is JSON-serializable
            ]);
        }

        if (!empty($errors)) {
            // Convert errors to flash session data
            $response = $response->with([
                'error_messages' => $errors,
                'uploaded_files' => $uploadedFiles ?? []
            ]);
        }

        return $response;
    }

    private function generateFingerprint($filePath)
    {
        if (!$filePath || !file_exists($filePath)) {
            \Log::error("Fingerprinting failed: File does not exist - " . $filePath);
            return null;
        }

        if (!is_readable($filePath)) {
            \Log::error("Fingerprinting failed: File is not readable - " . $filePath);
            return null;
        }

        $fpcalcPath = env('FPCALC_PATH', 'C:\fpcalc\fpcalc.exe');

        if (!file_exists($fpcalcPath)) {
            \Log::error("Fingerprinting failed: fpcalc.exe not found at {$fpcalcPath}");
            return null;
        }

        $command = sprintf(
            '%s -json %s 2>&1',
            escapeshellarg($fpcalcPath),
            escapeshellarg($filePath)
        );

        \Log::debug("Executing fingerprint command: {$command}");

        $output = shell_exec($command);
        $exitCode = $this->getLastCommandExitCode();

        if ($exitCode !== 0 || $output === null) {
            \Log::error("Fingerprinting failed", [
                'exit_code' => $exitCode,
                'output' => $output,
                'file' => $filePath
            ]);
            return null;
        }

        $result = json_decode(trim($output), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            \Log::error("Fingerprinting JSON parse failed", [
                'error' => json_last_error_msg(),
                'output' => $output
            ]);
            return null;
        }

        if (empty($result['fingerprint'])) {
            \Log::error("Fingerprinting failed: Empty fingerprint", ['result' => $result]);
            return null;
        }

        return $result['fingerprint'];
    }

    // Helper function to get command exit code (Windows/Linux compatible)
    private function getLastCommandExitCode()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return $this->getWindowsExitCode();
        }
        return shell_exec('echo $?');
    }

    private function getWindowsExitCode()
    {
        $output = shell_exec('echo %ERRORLEVEL%');
        return (int) trim($output);
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        return round($bytes / pow(1024, $pow), $precision) . ' ' . $units[$pow];
    }

    public function getAudioFiles(Request $request)
    {
        $query = AudioFile::where('user_id', auth()->id())
            ->with('user') // Eager load user relationship
            ->select([
                'audio_files.*',
            ]);

        return DataTables::of($query)
            ->addColumn('artist', function ($file) {
                return $file->user->artist_name ?? 'N/A';
            })
            ->addColumn('song_name', function ($file) {
                return pathinfo($file->original_name, PATHINFO_FILENAME);
            })
            ->addColumn('upload_date', function ($file) {
                return $file->created_at->format('M d, Y');
            })
            ->addColumn('audio_player', function ($file) {
                $url = asset('storage/' . str_replace('public/', '', $file->path));
                return '
                    <audio controls style="width: 300px; height: 30px;">
                        <source src="' . $url . '" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                ';
            })
            ->addColumn('action', function ($file) {
                return '
                    <div class="d-flex justify-content-end">

                        <button class="btn btn-icon btn-bg-light btn-active-color-info btn-sm edit-btn"
                            data-id="' . $file->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#kt_modal_upload"
                            data-name="' . e(pathinfo($file->original_name, PATHINFO_FILENAME)) . '"
                            data-isrc="' . e($file->isrc_code ?? '') . '"
                            data-mode="edit"
                            data-url="' . route('audio_files.edit', $file->id) . '">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-btn"
                                data-id="' . $file->id . '"
                                data-name="' . e(pathinfo($file->original_name, PATHINFO_FILENAME)) . '"
                                data-url="' . route('audio_files.destroy', $file->id) . '">
                            <i class="fas fa-trash"></i>
                        </button>


                    </div>
                ';
            })
            ->rawColumns(['audio_player', 'action'])
            ->make(true);
    }

    // AudioFileController.php
    public function destroy($id)
    {
        try {
            $file = AudioFile::findOrFail($id);

            // Verify ownership
            if ($file->user_id != auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized action'
                ], 403);
            }

            // Delete from storage
            Storage::delete($file->path);

            // Delete from database
            $file->delete();

            return response()->json([
                'success' => true,
                'message' => 'File deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting file: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id) {}
}
