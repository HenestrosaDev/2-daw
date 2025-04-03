<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fabricante;

class FabricanteController extends Controller
{
	public function index()
	{
		$fabricantes = Fabricante::all();
		return view('fabricantes.index', compact('fabricantes'));
	}

	public function create()
	{
		return view('fabricantes.create');
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'nombre' => 'required|string|max:100',
		]);

		Fabricante::create($validated);

		return redirect()->route('fabricantes.index');
	}

	public function show(Fabricante $fabricante)
	{
		$fabricante->load('productos');
		return view('fabricantes.show', compact('fabricante'));
	}

	public function edit(Fabricante $fabricante)
	{
		return view('fabricantes.edit', compact('fabricante'));
	}

	public function update(Request $request, Fabricante $fabricante)
	{
		$validated = $request->validate([
			'nombre' => 'required|string|max:100',
		]);

		$fabricante->update($validated);

		return redirect()->route('fabricantes.index');
	}

	public function destroy(Fabricante $fabricante)
	{
		$fabricante->delete();
		return redirect()->route('fabricantes.index');
	}
}
