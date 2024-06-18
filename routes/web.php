<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('homepage');
});

// Songs Routes

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');

Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');

Route::get('/songs/{id}/edit', [SongController::class, 'edit'])->name('songs.edit');

Route::get('/songs/{index}', [SongController::class, 'show'])->name('songs.show', '[1-9]+');

Route::post('/songs', [SongController::class, 'store'])->name('songs.store');

Route::put('/songs/{id}', [SongController::class, 'update'])->name('songs.update');

Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.destroy');


// Bands Routes
Route::get('/bands', [BandController::class, 'index'])->name('bands.index');

Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create');

Route::get('/bands/{id}/edit', [BandController::class, 'edit'])->name('bands.edit');

Route::get('/bands/{index}', [BandController::class, 'show'])->name('bands.show', '[1-9]+');

Route::post('/bands', [BandController::class, 'store'])->name('bands.store');

Route::put('/bands/{id}', [BandController::class, 'update'])->name('bands.update');

Route::delete('/bands/{id}', [BandController::class, 'destroy'])->name('bands.destroy');


// Albums Routes
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');

Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');

Route::get('/albums/{id}/edit', [AlbumController::class, 'edit'])->name('albums.edit');

Route::get('/albums/{index}', [AlbumController::class, 'show'])->name('albums.show', '[1-9]+');

Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');

Route::put('/albums/{id}', [AlbumController::class, 'update'])->name('albums.update');

Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');
