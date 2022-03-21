<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

Route::get('/articulo/{id}/cliente', function ($id) {
	return Articulo::find($id)->cliente->nombre;
});