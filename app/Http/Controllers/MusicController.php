<?php

// app/Http/Controllers/MusicController.php
namespace App\Http\Controllers;

use App\Models\AudioFile;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use getID3;
use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use Illuminate\Support\Facades\Auth;
// use DataTables;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MusicController extends Controller
{

    public function upload(Request $request)
    {
        $validated = $request->validate([
            'music1' => 'required|file|mimes:mp3,wav,aac,ogg,flac|max:20480',
            'song_title' => 'required|string|max:255',
            'isrc_code' => 'nullable|string|max:12',
        ]);

        $uploadedFile = null;
        $errorMessage = null;
        $activityData = [
            'song_title' => $validated['song_title'],
            'file_size' => $request->file('music1')->getSize(),
            'isrc_code' => $validated['isrc_code'] ?? null
        ];

        if ($request->hasFile('music1')) {
            $file = $request->file('music1');
            $originalName = $file->getClientOriginalName();
            $activityData['original_filename'] = $originalName;

            try {
                $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', pathinfo($originalName, PATHINFO_FILENAME))
                    . '.' . $file->extension();

                $path = $file->storeAs('music', time() . '_' . $safeName);
                $fullPath = Storage::path($path);

                if (!Storage::exists($path)) {
                    throw new \Exception("File storage failed");
                }

                $fingerprint = $this->generateFingerprint($fullPath);
                if (!$fingerprint) {
                    Storage::delete($path);
                    throw new \Exception("Fingerprint generation failed");
                }

                $newHash = hash('sha256', $fingerprint);
                if (AudioFile::where('fingerprint_hash', $newHash)->exists()) {
                    Storage::delete($path);
                    throw new \Exception("This song has already been uploaded");
                }

                $getID3 = new \getID3;
                $fileInfo = $getID3->analyze($fullPath);

                $uploadedFile = AudioFile::create([
                    'user_id' => auth()->id(),
                    'filename' => basename($path),
                    'original_name' => $originalName,
                    'path' => $path,
                    'file_size' => $this->formatBytes($file->getSize()),
                    'duration' => $fileInfo['playtime_string'] ?? null,
                    'fingerprint' => $fingerprint,
                    'fingerprint_hash' => $newHash,
                    'song_title' => $validated['song_title'],
                    'isrc_code' => $validated['isrc_code'],
                    'mime_type' => $file->getMimeType(),
                ]);

                // Log successful upload
                ActivityLogger::log(
                    auth()->user(),
                    'audio_upload',
                    'Uploaded audio file: ' . $validated['song_title'],
                    array_merge($activityData, [
                        'file_id' => $uploadedFile->id,
                        'duration' => $fileInfo['playtime_string'] ?? null,
                        'status' => 'success'
                    ])
                );
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                $activityData['error'] = $errorMessage;

                // Log failed upload attempt
                ActivityLogger::log(
                    auth()->user(),
                    'audio_upload_failed',
                    'Failed to upload audio: ' . $originalName,
                    array_merge($activityData, [
                        'status' => 'failed',
                        'error_message' => $errorMessage
                    ])
                );

                \Log::error("Audio upload error: " . $e->getMessage(), [
                    'file' => $originalName,
                    'trace' => $e->getTraceAsString()
                ]);
            }
        }

        if ($uploadedFile) {
            return back()->with([
                'success' => 'File uploaded successfully!',
                'uploaded_file' => $uploadedFile
            ]);
        }

        return back()->with([
            'error_message' => $errorMessage ?? 'Unknown upload error',
            'old_input' => $request->except('music1')
        ]);
    }

    //local
    // private function generateFingerprint($filePath)
    // {
    //     if (!$filePath || !file_exists($filePath)) {
    //         \Log::error("Fingerprinting failed: File does not exist - " . $filePath);
    //         return null;
    //     }

    //     if (!is_readable($filePath)) {
    //         \Log::error("Fingerprinting failed: File is not readable - " . $filePath);
    //         return null;
    //     }

    //     $fpcalcPath = env(base_path('fpcalc'), 'C:\fpcalc\fpcalc.exe');
    //     // $fpcalcPath = base_path('fpcalc');

    //     if (!file_exists($fpcalcPath)) {
    //         \Log::error("Fingerprinting failed: fpcalc.exe not found at {$fpcalcPath}");
    //         return null;
    //     }

    //     $command = sprintf(
    //         '%s -json %s 2>&1',
    //         escapeshellarg($fpcalcPath),
    //         escapeshellarg($filePath)
    //     );

    //     \Log::debug("Executing fingerprint command: {$command}");

    //     $output = shell_exec($command);
    //     $exitCode = $this->getLastCommandExitCode();

    //     if ($exitCode !== 0 || $output === null) {
    //         \Log::error("Fingerprinting failed", [
    //             'exit_code' => $exitCode,
    //             'output' => $output,
    //             'file' => $filePath
    //         ]);
    //         return null;
    //     }

    //     $result = json_decode(trim($output), true);

    //     if (json_last_error() !== JSON_ERROR_NONE) {
    //         \Log::error("Fingerprinting JSON parse failed", [
    //             'error' => json_last_error_msg(),
    //             'output' => $output
    //         ]);
    //         return null;
    //     }

    //     if (empty($result['fingerprint'])) {
    //         \Log::error("Fingerprinting failed: Empty fingerprint", ['result' => $result]);
    //         return null;
    //     }

    //     return $result['fingerprint'];
    // }

    // live
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
        // $fpcalcPath = env(base_path('fpcalc'), 'C:\fpcalc\fpcalc.exe');

        $fpcalcPath = base_path('fpcalc');

        if (!file_exists($fpcalcPath)) {
            \Log::error("Fingerprinting failed: fpcalc not found at {$fpcalcPath}");
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

        // Debugging: Log raw output
        \Log::debug("Raw fpcalc output:", ['output' => $output]);

        // Check for command failure (exit code 0 means success)
        if ($exitCode !== 0 || $output === null) {
            \Log::error("Fingerprinting failed", [
                'exit_code' => $exitCode,
                'output' => $output,
                'file' => $filePath
            ]);
            return null;
        }

        // Trim whitespace and decode JSON
        $output = trim($output);
        $result = json_decode($output, true);

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

    private function getLastCommandExitCode()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return $this->getWindowsExitCode();
        }
        return (int)shell_exec('echo $?'); // Cast to integer
    }

    private function getWindowsExitCode()
    {
        return (int)shell_exec('echo %ERRORLEVEL%');
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
        $query = AudioFile::when(auth()->user()->role_id != 1, function ($q) {
            $q->where('user_id', auth()->id());
        })
            ->with('user')
            ->select(['audio_files.*']);

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
            ->addColumn('status', function ($file) {
                if (auth()->user()->role_id == 1) {


                    $status = $file->approve_status == 1 ? 'Approved' : 'Pending';
                    $color = $status === 'Approved' ? 'success' : 'danger';

                    return '<span class="badge-light-' . e($color) . '">' . e(ucfirst($status)) . '</span>';
                }
            })
            ->addColumn('action', function ($file) {
                $buttons = '<div class="d-flex justify-content-end">';

                if (auth()->user()->role_id == 2) {
                    $audioUrl = asset('storage/' . str_replace('public/', '', $file->path));
                    $url = 'audio_files_edit';

                    $buttons .= '
                        <button class="btn btn-icon btn-bg-light btn-active-color-info btn-sm edit-btn"
                            data-id="' . $file->id . '"
                            onclick="editFunction(' . $file->id . ', \'' . addslashes($file->original_name) . '\', \'' . addslashes($file->isrc_code) . '\', \'' . $url . '\', \'' . $audioUrl . '\')"
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
                    ';
                }
                if (auth()->user()->role_id == 1) {
                    $buttons .= '
                      <button class="btn  btn-bg-success btn-active-color-white btn-sm approve-btn"
                                data-id="' . $file->id . '"
                                data-name="' . e(pathinfo($file->original_name, PATHINFO_FILENAME)) . '"
                                data-url="' . route('audio_files.aprove_song', $file->id) . '">
                           Aprove
                        </button>
                ';
                }
                $buttons .= '</div>';
                return $buttons;
            })
            ->rawColumns(['audio_player', 'action', 'status'])
            ->make(true);
    }

    public function destroy($id)
    {
        try {
            $file = AudioFile::findOrFail($id);
            $activityData = [
                'song_title' => $file->original_name,
                'file_size' => $file->file_size,
                'isrc_code' => $file->isrc_code
            ];

            if ($file->user_id != auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized action'
                ], 403);
            }

            Storage::delete($file->path);

            $file->delete();

            // Log successful upload
            ActivityLogger::log(
                auth()->user(),
                'audio_delete',
                'Deleted audio file: ' . $file->original_name,
                array_merge($activityData, [
                    'file_id' => $id,
                    'duration' => $fileInfo['playtime_string'] ?? null,
                    'status' => 'success'
                ])
            );

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

    public function edit(Request $request)
    {
        $request->validate([
            'song_title' => 'required|string|max:255',
            'isrc_code' => 'nullable|string|max:12',
            'music' => 'sometimes|file|mimes:mp3,wav,aac,ogg,flac|max:20480',
        ]);

        DB::beginTransaction();
        try {
            $audioFile = AudioFile::findOrFail($request->song_id);
            $originalPath = $audioFile->path;
            $newFileData = [];
            $fingerprintUpdated = false;




            if ($request->hasFile('music')) {
                $file = $request->file('music');
                $originalName = $file->getClientOriginalName();
                $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', pathinfo($originalName, PATHINFO_FILENAME))
                    . '.' . $file->extension();

                $path = $file->storeAs('music', time() . '_' . $safeName);
                $fullPath = Storage::path($path);

                if (!Storage::exists($path)) {
                    throw new \Exception("File storage failed: {$path}");
                }

                // Generate new fingerprint
                $fingerprint = $this->generateFingerprint($fullPath);
                $newHash = hash('sha256', $fingerprint);

                if (!$fingerprint) {
                    Storage::delete($path);
                    throw new \Exception("Fingerprint generation failed");
                }

                // Check for duplicates (excluding current file)
                if (AudioFile::where('fingerprint_hash', $newHash)
                    ->where('id', '!=', $audioFile->id)
                    ->exists()
                ) {
                    Storage::delete($path);
                    throw new \Exception("This audio content already exists in the system");
                }

                // Get audio metadata
                $getID3 = new \getID3;
                $fileInfo = $getID3->analyze($fullPath);

                $newFileData = [
                    'filename' => basename($path),
                    'original_name' => $originalName,
                    'path' => $path,
                    'file_size' => $this->formatBytes($file->getSize()),
                    'duration' => $fileInfo['playtime_string'] ?? null,
                    'fingerprint' => $fingerprint,
                    'fingerprint_hash' => $newHash,
                    'mime_type' => $file->getMimeType(),
                    'bitrate' => $fileInfo['audio']['bitrate'] ?? null,
                    'sample_rate' => $fileInfo['audio']['sample_rate'] ?? null,
                ];
                $fingerprintUpdated = true;
            }

            // Update common fields
            $audioFile->update(array_merge([
                'song_title' => $request->song_title,
                'isrc_code' => $request->isrc_code,
            ], $newFileData));

            if ($request->hasFile('music') && Storage::exists($originalPath)) {
                Storage::delete($originalPath);
            }

            DB::commit();

            return back()->with([
                'success' => 'Audio file updated successfully',
                'fingerprint_updated' => $fingerprintUpdated,
                'updated_file' => $audioFile->fresh()
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            \log::error("Audio edit error: " . $e->getMessage(), [
                'song_id' => $request->song_id ?? 'unknown',
                'trace' => $e->getTraceAsString()
            ]);

            return back()->with([
                'error' => 'Failed to update audio file: ' . $e->getMessage(),
                'old_input' => $request->except('music')
            ]);
        }
    }

    public function approveSong($id)
    {
        try {
            $audio = AudioFile::find($id);
            $audio->approve_status = 1;
            $audio->save();

            return response()->json([
                'success' => true,
                'message' => 'Song Approved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error Approving file: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getApprovedSong()
    {
        $query = AudioFile::when(auth()->user()->role_id != 1, function ($q) {
            $q->where('user_id', auth()->id());
        })
            ->with('user')
            ->where('approve_status', 1)
            ->select(['audio_files.*']);
        return DataTables::of($query)
            ->addColumn('artist', function ($file) {
                return $file->user->artist_name ?? 'N/A';
            })
            ->addColumn('song_name', function ($file) {
                return pathinfo($file->original_name, PATHINFO_FILENAME);
            })
            ->addColumn('uploaded_date', function ($file) {
                return $file->created_at->format('M d, Y');
            })
            ->addColumn('listeners', function ($file) {
                return 12;
            })
            ->addColumn('status', function ($file) {
                return 'Approved';
            })
            ->addColumn('audio_file', function ($file) {
                $url = asset('storage/' . str_replace('public/', '', $file->path));
                return '
                    <audio controls style="width: 300px; height: 30px;">
                        <source src="' . $url . '" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                ';
            })
            // ->addColumn('action', function ($track) {
            //     return ''; // Add action buttons if needed
            // })
            ->rawColumns(['audio_file',  'status'])
            ->make(true);
    }

    public function getTrackDetails(Request $request)
    {
        $song = AudioFile::findOrFail($request->song_id);

        return view('songs.song_track_details', compact('song'));
    }
}
