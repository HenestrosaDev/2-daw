<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductosRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\CreateProductosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductosRequest $request)
    {
        //$this->validate($request, ['seccion'=>'required']);

        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->seccion = $request->seccion;
        $producto->precio = $request->precio;
        $producto->fecha = $request->fecha;
        $producto->pais_origen = $request->pais_origen;
        $producto->save();
    }
}