<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/admin/users', App\Http\Controllers\AdminController::class);
//Route::post('/admin/users', [App\Http\Controllers\AdminController::class, 'store'])->name("admin.users.store");

//Route::patch('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name("admin.users.update");
//Route::delete('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name("admin.users.destroy");