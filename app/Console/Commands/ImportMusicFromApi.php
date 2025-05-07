<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\TrackedMusic;
use App\Models\MusicTrackInfo;
use Illuminate\Support\Facades\Log;

class ImportMusicFromApi extends Command
{
    protected $signature = 'import:music {--ip= : IP address to log}';
    protected $description = 'Fetch music data from API and store in database';

    public function handle(): void
    {
        // Get IP from option or server IP
        $ipAddress = $this->option('ip') ?? gethostbyname(gethostname());

        Log::info("Starting music import from IP: {$ipAddress}");

        try {
            $response = Http::get('http://localhost:8000/api/music-tracks');

            if ($response->successful()) {
                $allTracks = $response->json();

                // Check if we got an array of tracks
                if (!is_array($allTracks)) {
                    $this->error('Invalid API response - expected array of tracks');
                    Log::error('Invalid API response - expected array of tracks');
                    return;
                }

                $importCount = 0;

                foreach ($allTracks as $trackData) {
                    // Skip if the track structure is invalid
                    if (!isset($trackData['metadata']['music'][0])) {
                        $this->warn('Skipping invalid track structure');
                        Log::warning('Skipping invalid track structure', ['track_data' => $trackData]);
                        continue;
                    }

                    $musicData = $trackData['metadata']['music'][0];
                    $resultData = $trackData['data']['result']['music'] ?? null;

                    // Create or update music record
                    $trackedMusic = TrackedMusic::updateOrCreate(
                        ['music_id' => $musicData['music_id'] ?? $this->generateMusicId()],
                        [
                            'title' => $musicData['title'],
                            'artist' => $musicData['artist'],
                            'album' => $musicData['album'],
                            'release_date' => $musicData['release_date'],
                            'duration' => $musicData['duration'],
                            'genre' => $musicData['genre'],
                            'cover_url' => $musicData['cover_url'],
                            'language' => $musicData['language'] ?? null,
                            'label' => $musicData['label'] ?? null,
                            'confidence' => $resultData['confidence'] ?? null,
                            'updated_by_ip' => $ipAddress,
                        ]
                    );

                    // Create or update track info if exists
                    if (isset($musicData['track'])) {
                        MusicTrackInfo::updateOrCreate(
                            ['tracked_music_id' => $trackedMusic->id],
                            [
                                'start_time' => $musicData['track']['start_time'],
                                'end_time' => $musicData['track']['end_time'],
                            ]
                        );
                    }

                    $importCount++;
                    $this->info("Processed: {$musicData['title']}");
                }

                $this->info("Successfully imported {$importCount} tracks");
                Log::info("Music import completed", [
                    'import_count' => $importCount,
                    'ip' => $ipAddress
                ]);
            } else {
                $this->error("API request failed with status: {$response->status()}");
                Log::error("API request failed", [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
            }
        } catch (\Exception $e) {
            $this->error("Error: {$e->getMessage()}");
            Log::error("Music import failed", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    protected function generateMusicId()
    {
        return 'gen_' . uniqid();
    }
}
