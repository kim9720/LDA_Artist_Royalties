<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // song Route
    Route::get('/song_upload', [SongController::class, 'upload'])->name('song_upload');
    Route::get('/all_songs', [SongController::class, 'index'])->name('all_song');
    Route::post('/upload-music', [SongController::class, 'songStore'])->name('music.upload');

});

require __DIR__ . '/auth.php';
