<?php

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

    //new
    Route::post('/upload_music', [MusicController::class, 'upload'])->name('music.upload');
    Route::get('/audio_files', [MusicController::class, 'index'])->name('audio_files.index');
    Route::get('/audio_files/data', [MusicController::class, 'getAudioFiles'])->name('audio_files.data');
    Route::delete('/audio_files/{id}', [MusicController::class, 'destroy'])->name('audio_files.destroy');
    Route::post('/audio_files_edit', [MusicController::class, 'edit'])->name('audio_files.edit');
    Route::post('/aprove_song/{id}', [MusicController::class, 'approveSong'])->name('audio_files.aprove_song');

    //admin
    Route::get('/show_users', [UserController::class, 'index'])->name('admin.show_users');
    Route::get('/get_users', [UserController::class, 'getUsers'])->name('admin.get_users');
    Route::post('/users_destroy/{id}', [UserController::class, 'userDelete'])->name('admin.users_destroy');
    Route::get('/user_profile_show/{id}', [UserController::class, 'userProfileShow'])->name('admin.user_profile_show');


});

require __DIR__ . '/auth.php';
