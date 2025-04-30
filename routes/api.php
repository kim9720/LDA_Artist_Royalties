<?php



use Illuminate\Support\Facades\Route;

    Route::get('/music-tracks', function () {
        return response()->json([
            [
                "status" => [
                    "msg" => "Success",
                    "code" => 0
                ],
                "metadata" => [
                    "music" => [
                        [
                            "music_id" => "001",
                            "title" => "Blinding Lights",
                            "artist" => "The Weeknd",
                            "album" => "After Hours",
                            "release_date" => "2020-11-29",
                            "duration" => 200,
                            "genre" => "Pop",
                            "cover_url" => "http://example.com/cover1.jpg",
                            "language" => "English",
                            "track" => [
                                "start_time" => "00:01:23",
                                "end_time" => "00:03:43"
                            ],
                            "label" => "Republic Records"
                        ]
                    ]
                ],
                "data" => [
                    "code" => 0,
                    "result" => [
                        "music" => [
                            "title" => "Blinding Lights",
                            "artist" => "The Weeknd",
                            "album" => "After Hours",
                            "duration" => 200,
                            "genre" => "Pop",
                            "release_date" => "2020-11-29",
                            "cover_url" => "http://example.com/cover1.jpg",
                            "confidence" => 0.98
                        ]
                    ]
                ]
            ]
        ]);
    });


