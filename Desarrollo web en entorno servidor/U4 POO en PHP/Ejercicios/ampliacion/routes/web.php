<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'admin'], function () {
	Route::resource('/ticket', TicketController::class);
	Route::resource('/film', FilmController::class)->except([
		'index',
		'show',
	]);
});

// INDEX
Route::get('/', [IndexController::class, 'index'])->name('index');

// FILM
Route::get('/film', [FilmController::class, 'index'])->name('film.index');
Route::get('/film/{film}', [FilmController::class, 'show'])->name('film.show');

/* 
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
