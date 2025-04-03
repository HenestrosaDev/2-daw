<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Http\Controllers\ProductosController;
use App\Models\Articulo;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

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


// Route::get("/index", [ProductosController::class, 'index']);
// Route::get("/create", [ProductosController::class, 'create']);
// Route::get("/update", [ProductosController::class, 'update']);
// Route::get("/store", [ProductosController::class, 'store']);
// Route::get("/delete", [ProductosController::class, 'destroy']);

// Todas las rutas comentadas arriba son equivalentes a la siguiente línea:
Route::resource('/productos', ProductosController::class);
