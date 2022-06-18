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

Route::get('/', function () {
    return view('layouts.index');
})->name('index');

Route::get('/', function () {
    return view('layouts.cv');
})->name('cv');

Route::get('/', function () {
    return view('layouts.portfolio');
})->name('portfolio');

Route::get('/', function () {
    return view('layouts.sobre-mi');
})->name('sobre-mi');