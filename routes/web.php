<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [ProfileController::class, 'returnDashboart'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'updateEmail'])->name('profile.update');
    Route::patch('/reset_password', [ProfileController::class, 'resetPassword'])->name('profile.reset_password');
    Route::delete('/delete_acount', [ProfileController::class, 'destroy'])->name('profile.delete_acount');
    Route::get('/profile_show', [ProfileController::class, 'profileShow'])->name('profile.profile_show');
    Route::get('/profile_settings', [ProfileController::class, 'profileSettings'])->name('profile.profile_settings');
    Route::get('/profile_bill', [ProfileController::class, 'profileBill'])->name('profile.profile_bill');
    Route::post('/profile_update_basic', [ProfileController::class, 'editBasicuserInfo'])->name('profile.profile_update_basic');


    // song Route
    Route::get('/song_upload', [SongController::class, 'upload'])->name('song_upload');
    Route::get('/all_songs', [SongController::class, 'index'])->name('all_song');
    // Route::post('/upload-music', [SongController::class, 'songStore'])->name('music.upload');

    //new route for song
    Route::post('/upload_music', [MusicController::class, 'upload'])->name('music.upload');
    Route::get('/audio_files', [MusicController::class, 'index'])->name('audio_files.index');
    Route::get('/audio_files/data', [MusicController::class, 'getAudioFiles'])->name('audio_files.data');
    Route::delete('/audio_files/{id}', [MusicController::class, 'destroy'])->name('audio_files.destroy');
    Route::post('/audio_files_edit', [MusicController::class, 'edit'])->name('audio_files.edit');
    Route::get('/approved_song', [MusicController::class, 'getApprovedSong'])->name('approved_song.get');
    Route::post('/track_details', [MusicController::class, 'getTrackDetails'])->name('song.track_details');

    //Complaints
    Route::get('/complaints_list', [ComplaintController::class, 'complaintListPage'])->name('complaints.show');
    Route::get('/complaints_compose', [ComplaintController::class, 'complaintComposePage'])->name('complaints.compose');
    Route::post('/complaints_compose', [ComplaintController::class, 'complaintStore'])->name('complaints.store');
    Route::get('complaints_datatable', [ComplaintController::class, 'getComplaints'])->name('complaints.datatable');
    Route::get('/complaints_show/{complaint}', [ComplaintController::class, 'show'])->name('complaints.get');
    Route::get('/complaints_mark_read/{complaint}', [ComplaintController::class, 'markReaded'])->name('complaints.mark_read');
    Route::get('/complaints_marked_list', [ComplaintController::class, 'complaintMarkedPage'])->name('complaints.marked_show');
    Route::get('complaints_maked', [ComplaintController::class, 'getMarkedComplaints'])->name('complaints.marked_get');
    Route::post('complaints_delete', [ComplaintController::class, 'deleteComplaints'])->name('complaints.delete');


    //Payment
    Route::get('payment_page', [PaymentController::class, 'index'])->name('payment.index');


    //admin
    Route::post('/aprove_song/{id}', [MusicController::class, 'approveSong'])->name('audio_files.aprove_song');
    Route::get('/show_users', [UserController::class, 'index'])->name('admin.show_users');
    Route::get('/get_users', [UserController::class, 'getUsers'])->name('admin.get_users');
    Route::post('/users_destroy/{id}', [UserController::class, 'userDelete'])->name('admin.users_destroy');
    Route::get('/user_profile_show/{id}', [UserController::class, 'userProfileShow'])->name('admin.user_profile_show');
    Route::get('/user_song_page/{id}', [UserController::class, 'userSongPage'])->name('admin.user_song_page');
    Route::get('/user_song_get/{id}', [UserController::class, 'userSongGet'])->name('admin.user_song_get');
});


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

require __DIR__ . '/auth.php';
