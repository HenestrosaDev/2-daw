<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

Route::get("/cliente/{id}/calificaciones", function($id) {
	$cliente = Cliente::find($id);

	foreach($cliente->calificaciones as $calificacion) {
		echo $calificacion->calificacion;
	}
});

Route::get("/articulo/{id}/calificaciones", function($id) {
	$articulo = Articulo::find($id);

	foreach($articulo->calificaciones as $calificacion) {
		echo $calificacion->calificacion;
	}
});