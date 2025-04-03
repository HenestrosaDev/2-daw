<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

Route::get('/cliente/{id}/articulo', function ($id) {
	return Cliente::find($id)->articulo;
});