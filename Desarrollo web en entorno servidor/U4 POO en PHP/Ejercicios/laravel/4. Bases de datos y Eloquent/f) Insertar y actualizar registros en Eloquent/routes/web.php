<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

Route::get('/articulos-insertar', function () {
	$articulo = new Articulo;
	$articulo->nombre_articulo = "Pantalones";
	$articulo->precio = 60;
	$articulo->pais_origen = "España";
	$articulo->seccion = "Confección";
	$articulo->observaciones = "Lavados a la piedra";

	$articulo->save();
});
Route::get('/articulos-actualizar', function () {
	$articulo = Articulo::find(2); // 2 es el id de
	$articulo->nombre_articulo = "Pantalones";
	$articulo->precio = 90;
	$articulo->pais_origen = "España";
	$articulo->seccion = "Confección";
	$articulo->observaciones = "Lavados a la piedra";

	$articulo->save();
});