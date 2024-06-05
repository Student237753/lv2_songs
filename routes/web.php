<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\BandController;

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

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');

Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');

Route::get('/songs/{id}/edit', [SongController::class, 'edit'])->name('songs.edit');

Route::get('/songs/{index}', [SongController::class, 'show'])->name('songs.show', '[1-9]+');

Route::post('/songs', [SongController::class, 'store'])->name('songs.store');

Route::put('/songs/{id}', [SongController::class, 'update'])->name('songs.update');

Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.destroy');

//Bands

Route::get('/Bands', [BandController::class, 'index'])->name('Bands.index');

Route::get('/Bands/create', [BandController::class, 'create'])->name('Bands.create');

Route::get('/Bands/{id}/edit', [BandController::class, 'edit'])->name('Bands.edit');

Route::get('/Bands/{index}', [BandController::class, 'show'])->name('Bands.show', '[1-9]+');

Route::post('/Bands', [BandController::class, 'store'])->name('Bands.store');

Route::put('/Bands/{id}', [BandController::class, 'update'])->name('Bands.update');

Route::delete('/Bands/{id}', [BandController::class, 'destroy'])->name('Bands.destroy');

