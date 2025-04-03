<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

Route::get('/articulos-orm', function () {
	$articulos = Articulo::all();
	foreach($articulos as $articulo) {
		echo $articulo->nombre_articulo;
	}
});