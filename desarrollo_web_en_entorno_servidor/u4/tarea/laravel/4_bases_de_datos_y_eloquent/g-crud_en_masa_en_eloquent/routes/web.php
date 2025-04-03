<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

Route::get('/articulos-actualizar-cascada', function () {
	Articulo::where('seccion', 'Cerámica')->where('pais_origen', 'España')->update(['seccion' => 'Menaje']);
});
Route::get('/articulos-borrar', function () {
	$articulo = Articulo::find(2);
	$articulo->delete();
});
Route::get('/articulos-borrar-cascada', function () {
	Articulo::where('seccion', 'Menaje')->delete();
});
Route::get('/articulos-create', function () {
	Articulo::create(['nombre_articulo'=>'Impresora', 'precio'=>50, 'pais_origen'=>'Colombia', 'observaciones'=>'Nada que añadir', 'seccion'=>'Menaje']);
});