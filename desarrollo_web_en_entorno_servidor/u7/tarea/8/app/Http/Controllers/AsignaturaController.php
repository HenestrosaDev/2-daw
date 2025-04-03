<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignatura;

class AsignaturaController extends Controller
{
	public function indexAdmin()
	{
		$asignaturas = Asignatura::all();
		return view('asignatura.index-admin', compact('asignaturas'));
	}
	
	public function indexAlumno()
	{
		$asignaturas = Asignatura::all();
		return view('asignatura.index-alumno', compact('asignaturas'));
	}

	public function indexProfesor() 
	{
		$profesor_id = auth()->user()->id;

		$asignaturas = Asignatura::where('profesor_id', $profesor_id)->get();

		return view('asignatura.index-profesor', compact('asignaturas'));
	}

	public function show($id)
	{
		$asignatura = Asignatura::findOrFail($id);
		$asignatura->load('alumnos'); // Cargar la relación con los alumnos

		return view('asignatura.show', compact('asignatura'));
	}
	
	public function create()
	{
		return view('asignatura.create');
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'profesor_id'	=> 'required|exists:users,id',
			'nombre'			=> 'required|max:100',
		]);

		Asignatura::create($validated);

		return redirect()->back()->with('success', 'Asignatura creada correctamente.');
	}

	public function enroll(Request $request, int $id)
	{
		$asignatura = Asignatura::findOrFail($id);

		$user = auth()->user();

		if (!$asignatura->isEnrolled($user->id)) {
			$asignatura->alumnos()->attach($user->id);
			return redirect()->route('asignatura.index.alumno')->with('success', 'Inscripción exitosa.');
		}

		return redirect()->route('asignatura.index.alumno')->with('success', 'Ya estás inscrito en esta asignatura.');
	}

	public function destroy(Asignatura $asignatura)
	{
		$asignatura->delete();
		return redirect()->route('asignaturas.index')->with('success', 'Asignatura eliminada correctamente.');
	}
}
