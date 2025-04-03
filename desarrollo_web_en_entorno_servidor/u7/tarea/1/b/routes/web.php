<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => view('layouts.index'))->name('index');
Route::get('/cv', fn () => view('layouts.cv'))->name('cv');
Route::get('/portfolio', fn () => view('layouts.portfolio'))->name('portfolio');
Route::get('/sobre-mi', fn () => view('layouts.sobre-mi'))->name('sobre-mi');