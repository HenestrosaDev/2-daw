<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

Route::get('/articulos-soft-delete', function () {
	Articulo::find(3)->delete();
});
Route::get('/with-trashed', function () {
	// withTrashed() devuelve artículos borrados y no borrados
	return Articulo::withTrashed()->where('seccion', 'menaje')->get();
});
Route::get('/only-trashed', function () {
	// onlyTrashed() SOLO devuelve artículos borrados 
	return Articulo::onlyTrashed()->where('id', 3)->get();
});
Route::get('/restore', function () {
	// restore() recupera un registro soft deleted.
	// Lo que hace es cambiar el valor a null de la columna deleted_at
	return Articulo::onlyTrashed()->where('id', 3)->restore();
});
Route::get('/hard-delete', function () {
	// forceDelete() elimina un registro por completo.
	return Articulo::withTrashed()->where('id', 3)->forceDelete();
});