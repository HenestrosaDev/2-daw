<?php

use Illuminate\Support\Facades\Route;
// Necesario para Laravel 9
use App\Http\Controllers\EjemploController;

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

Route::get('/sobrenosotros', function () {
    return 'Esta es la página que habla sobre nosotros';
});

Route::get('/contacto', function () {
    return 'Aquí te podrás poner en contacto con nosotros.';
});

Route::get('/foro', function () {
    return 'Aquí está el foro';
});

Route::get('/post/{id}/{nombre}', function ($id, $nombre) {
    return "Este es el post nº $id, cuyo creador es $nombre";
})->where('nombre', '[A-z]+');

// La @ es equivalente al operador ->
/**
 * LARAVEL 6 (hay que quitar el namespace referente al EjemploController)
 * Route::get('/inicio', 'EjemploController@inicio');
 */

//
// LARAVEL 9.2.0 (se tiene que incluir el namespace referente al EjemploController)
Route::get('/inicio', [EjemploController::class, 'inicio']);