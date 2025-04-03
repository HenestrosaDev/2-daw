<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;

Route::get('/', fn () => view('index'))->name('index');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
	Route::get('/games', [GameController::class, 'index'])->name('game.index');
	Route::post('/games/challenge', [GameController::class, 'challenge'])->name('game.challenge');
	Route::post('/games/respond/{game}', [GameController::class, 'respond'])->name('game.respond');
	Route::get('/rankings', [GameController::class, 'rankings'])->name('game.rankings');
});

require __DIR__.'/auth.php';
