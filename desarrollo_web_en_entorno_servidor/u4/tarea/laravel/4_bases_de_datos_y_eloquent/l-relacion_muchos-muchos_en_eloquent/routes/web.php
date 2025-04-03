<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB

Route::get("/cliente/{id}/perfil", function($id) {
	$cliente = Cliente::find($id);

	foreach($cliente->perfils as $perfil) {
		echo $perfil->nombre;
	}
});