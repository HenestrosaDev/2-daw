<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use Illuminate\Support\Facades\DB;

Route::get('/insertar', function() {
	DB::insert(
		"INSERT INTO articulos (nombre_articulo, precio, pais_origen, seccion, observaciones) VALUES (?,?,?,?,?)",
		["Jarrón", 15.2, "Japón", "Cerámica", "Ganga"]
	);
});
Route::get('/obtener', function () {
	$articulos = DB::select("SELECT * FROM articulos WHERE id=?", [1]);
	foreach($articulos as $articulo) {
		return $articulo->nombre_articulo;
	}
});
Route::get('/actualizar', function () {
	DB::update("UPDATE articulos SET seccion='Decoración' WHERE id=?", [1]);
});
Route::get('/eliminar', function () {
	DB::update("DELETE FROM articulos WHERE id=?", [1]);
});