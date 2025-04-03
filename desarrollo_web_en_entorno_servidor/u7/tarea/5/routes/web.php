<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoGameController;

Route::get('/', fn () => view('index'))->name('index');

Route::get('/games', [VideoGameController::class, 'index'])->name('games.index');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');

// Admin routes
Route::prefix('admin')->group(function () {
	Route::get('/games', [VideoGameController::class, 'indexAdmin'])->name('games.admin.index');
	Route::get('/game/add', [VideoGameController::class, 'create'])->name('games.create');
	Route::post('/game/add', [VideoGameController::class, 'store'])->name('games.store');

	Route::get('/game/edit/{id}', [VideoGameController::class, 'edit'])->name('games.edit');
	Route::put('/game/edit/{id}', [VideoGameController::class, 'update'])->name('games.update');

	Route::delete('/game/delete/{id}', [VideoGameController::class, 'destroy'])->name('games.destroy');
});