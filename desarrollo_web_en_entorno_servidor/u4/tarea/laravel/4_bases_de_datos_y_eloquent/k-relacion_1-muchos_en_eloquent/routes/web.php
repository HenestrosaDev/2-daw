<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

Route::get('cliente/{id}/articulos', function($id) {
	/* 
	 * Si queremos filtrar el artículo:
	 * $articulos = Cliente::find($id)->articulos->where('pais_origen', 'Suiza')->first();	// tmb se puede usar last()
	 */
	$articulos = Cliente::find($id)->articulos;

	foreach ($articulos as $articulo) {
		echo $articulo->nombre_articulo;
	}
});