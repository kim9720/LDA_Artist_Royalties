<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\MusicController;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [ProfileController::class, 'returnDashboart'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // song Route
    Route::get('/song_upload', [SongController::class, 'upload'])->name('song_upload');
    Route::get('/all_songs', [SongController::class, 'index'])->name('all_song');
    // Route::post('/upload-music', [SongController::class, 'songStore'])->name('music.upload');

    //new
    Route::post('/upload_music', [MusicController::class, 'upload'])->name('music.upload');
    Route::get('/audio_files', [MusicController::class, 'index'])->name('audio_files.index');
    Route::get('/audio_files/data', [MusicController::class, 'getAudioFiles'])->name('audio_files.data');
    Route::delete('/audio_files/{id}', [MusicController::class, 'destroy'])->name('audio_files.destroy');
    Route::post('/audio_files_edit', [MusicController::class, 'edit'])->name('audio_files.edit');
    Route::post('/aprove_song/{id}', [MusicController::class, 'approveSong'])->name('audio_files.aprove_song');
});

require __DIR__ . '/auth.php';
