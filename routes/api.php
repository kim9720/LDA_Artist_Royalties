<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/music-tracks', function () {
    $baseTrack = [
        "status" => [
            "msg" => "Success",
            "code" => 0
        ],
        "metadata" => [
            "music" => [
                [
                    "music_id" => "", // to be filled below
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
    ];

    $tracks = [];

    for ($i = 1; $i <= 5; $i++) {
        $track = $baseTrack;
        $track['metadata']['music'][0]['music_id'] = str_pad($i, 3, '0', STR_PAD_LEFT); // "001", "002", etc.
        $tracks[] = $track;
    }

    return response()->json($tracks);
});
