<?php

use Illuminate\Support\Facades\Route;
// Necesario para Laravel 9
use App\Http\Controllers\EjemploController;
use App\Http\Controllers\Ejemplo3Controller;
use App\Http\Controllers\PaginasController;

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

Route::get('/', [PaginasController::class, 'inicio']);
Route::get('/inicio', [PaginasController::class, 'inicio']);
Route::get('/foro', [PaginasController::class, 'foro']);

/*
|--------------------------------------------------------------------------
| Ejemplos
|--------------------------------------------------------------------------
*/
Route::get('/foro-ejemplo', function () {
    return 'Aquí está el foro';
});

Route::get('/post-ejemplo/{id}/{nombre}', function ($id, $nombre) {
    return "Este es el post nº $id, cuyo creador es $nombre";
})->where('nombre', '[A-z]+');

/**
 * LARAVEL 6 (no es necesario incluir el 'use' referente al controlador)
 * La @ es equivalente al operador ->
 * Route::get('/inicio', 'EjemploController@inicio');
 */

// LARAVEL 9.2.0 (se tiene que incluir el 'use' referente al controlador)
Route::get('/inicio-ejemplo-1', [EjemploController::class, 'inicio']);
Route::get('/inicio-ejemplo-3', [Ejemplo3Controller::class, 'index']);