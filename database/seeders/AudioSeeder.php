<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AudioSeeder extends Seeder
{
    public function run()
    {
        // Insert audio file records into the audio_files table
        $audioFile1Id = DB::table('audio_files')->insertGetId([
            'filename' => 'UPLAND-20241007-200000-000.mp3',
            'user_id' => 1, // user_id 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $audioFile2Id = DB::table('audio_files')->insertGetId([
            'filename' => 'RUBOND-20241007-070000-000.mp3',
            'user_id' => 13, // user_id 13
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert audio matches for the first audio file (user_id = 1)
        DB::table('audio_matches')->insert([
            [
                'audio_file_id' => $audioFile1Id, // Referencing first audio file
                'status_code' => 0,
                'start_time_ms' => 310740,
                'end_time_ms' => 375020,
                'duration_ms' => 67453,
                'played_duration_ms' => 64280,
                'title' => 'BETIKA_ MTOKO WA KIBINGWA_ CHAGUO LA MABINGWA',
                'score' => 100,
                'audio_id' => null,
                'bucket_id' => '22819',
                'acrid' => '0126f8890b81d6015e658da3e1cabb4f',
                'sample_begin_time_offset_ms' => 5740,
                'sample_end_time_offset_ms' => 9520,
                'db_begin_time_offset_ms' => 0,
                'db_end_time_offset_ms' => 3780,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'audio_file_id' => $audioFile1Id, // Referencing first audio file
                'status_code' => 0,
                'start_time_ms' => 2827540,
                'end_time_ms' => 2891820,
                'duration_ms' => 67453,
                'played_duration_ms' => 64280,
                'title' => 'BETIKA_ MTOKO WA KIBINGWA_ CHAGUO LA MABINGWA',
                'score' => 100,
                'audio_id' => null,
                'bucket_id' => '22819',
                'acrid' => '07c8eb0c9d72c86449263fc2ca283562',
                'sample_begin_time_offset_ms' => 7540,
                'sample_end_time_offset_ms' => 9200,
                'db_begin_time_offset_ms' => 0,
                'db_end_time_offset_ms' => 1660,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert audio matches for the second audio file (user_id = 13)
        DB::table('audio_matches')->insert([
            [
                'audio_file_id' => $audioFile2Id, // Referencing second audio file
                'status_code' => 3015,
                'start_time_ms' => 395000,
                'end_time_ms' => 400000,
                'duration_ms' => null,
                'played_duration_ms' => 10000,
                'title' => null,
                'score' => 0,
                'audio_id' => null,
                'bucket_id' => null,
                'acrid' => null,
                'sample_begin_time_offset_ms' => null,
                'sample_end_time_offset_ms' => null,
                'db_begin_time_offset_ms' => null,
                'db_end_time_offset_ms' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'audio_file_id' => $audioFile2Id, // Referencing second audio file
                'status_code' => 3015,
                'start_time_ms' => 400000,
                'end_time_ms' => 405000,
                'duration_ms' => null,
                'played_duration_ms' => 10000,
                'title' => null,
                'score' => 0,
                'audio_id' => null,
                'bucket_id' => null,
                'acrid' => null,
                'sample_begin_time_offset_ms' => null,
                'sample_end_time_offset_ms' => null,
                'db_begin_time_offset_ms' => null,
                'db_end_time_offset_ms' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'audio_file_id' => $audioFile2Id, // Referencing second audio file
                'status_code' => 3015,
                'start_time_ms' => 405000,
                'end_time_ms' => 410000,
                'duration_ms' => null,
                'played_duration_ms' => 10000,
                'title' => null,
                'score' => 0,
                'audio_id' => null,
                'bucket_id' => null,
                'acrid' => null,
                'sample_begin_time_offset_ms' => null,
                'sample_end_time_offset_ms' => null,
                'db_begin_time_offset_ms' => null,
                'db_end_time_offset_ms' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert similar_results for the first audio match
        DB::table('similar_results')->insert([
            [
                'audio_match_id' => 1, // Referencing first audio match
                'audio_id' => null,
                'bucket_id' => '22819',
                'duration_ms' => 45530,
                'sample_begin_time_offset_ms' => 7600,
                'sample_end_time_offset_ms' => 8640,
                'title' => 'VODACOM_ MPESA_HATUKWANGUA',
                'db_end_time_offset_ms' => 45000,
                'db_begin_time_offset_ms' => 43960,
                'acrid' => '92447761f9fa2db628399d61f1386172',
                'play_offset_ms' => 46120,
                'score' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'audio_match_id' => 1, // Referencing first audio match
                'audio_id' => null,
                'bucket_id' => '22819',
                'duration_ms' => 47145,
                'sample_begin_time_offset_ms' => 3520,
                'sample_end_time_offset_ms' => 9540,
                'title' => 'VODACOM_ NI BALAA_ KILA MTU NI MSHINDI',
                'db_end_time_offset_ms' => 36920,
                'db_begin_time_offset_ms' => 30900,
                'acrid' => '1c10a54f938b1766206ac9222e3cba84',
                'play_offset_ms' => 3520,
                'score' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
