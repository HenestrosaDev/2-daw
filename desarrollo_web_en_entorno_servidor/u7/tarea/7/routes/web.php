<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\ProductoController;

Route::get('/', fn () => view('index'))->name('index');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
	Route::middleware('admin')->group(function () {
		Route::resource('fabricantes', FabricanteController::class);
		Route::resource('productos', ProductoController::class);
	});

	Route::get('fabricantes', [FabricanteController::class, 'index'])->name('fabricantes.index');
	Route::get('fabricantes/{fabricante}', [FabricanteController::class, 'show'])->name('fabricantes.show');
});

require __DIR__.'/auth.php';
