<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

Route::get('/articulos-filtrados', function () {
	$articulos = Articulo::where('pais_origen', 'Japón')->orderBy('seccion', 'desc')->take(1)->get();
	return $articulos;
});

Route::get('/articulos-max', function () {
	$articulos = Articulo::where('pais_origen', 'Japón')->max('precio');
	return $articulos;
});

Route::get('/articulos-exists', function () {
	return DB::table('articulos')->where('precio', 1)->exists();
});

Route::get('/articulos-avg', function () {
	return Articulo::where('seccion', 'Cerámica')->avg('precio');
});