<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Fabricante;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
	public function create()
	{
		$fabricantes = Fabricante::all();
		return view('productos.create', compact('fabricantes'));
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'codigo_fabricante'	=> 'required|exists:fabricantes,codigo',
			'nombre'						=> 'required|string|max:100',
			'precio'						=> 'required|numeric',
		]);

		Producto::create($validated);

		return redirect()->route('fabricantes.show', $validated['codigo_fabricante']);
	}

	public function edit(Producto $producto)
	{
		$fabricantes = Fabricante::all();
		return view('productos.edit', compact('producto', 'fabricantes'));
	}

	public function update(Request $request, Producto $producto)
	{
		$validated = $request->validate([
			'codigo_fabricante'	=> 'required|exists:fabricantes,codigo',
			'nombre'						=> 'required|string|max:100',
			'precio'						=> 'required|numeric',
		]);

		$producto->update($validated);

		return redirect()->route('fabricantes.show', $validated['codigo_fabricante']);
	}

	public function destroy(Producto $producto)
	{
		$producto->delete();
		return redirect()->route('fabricantes.show', $producto->codigo_fabricante);
	}
}
