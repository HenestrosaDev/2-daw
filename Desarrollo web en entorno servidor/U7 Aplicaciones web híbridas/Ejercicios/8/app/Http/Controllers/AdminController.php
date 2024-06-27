<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
	public function indexAlumnos()
	{
		// Obtener todos los usuarios con el rol de alumno
		$alumnos = User::where('role', 'alumno')->get();

		// Pasar los alumnos a la vista
		return view('user.index-alumnos', compact('alumnos'));
	}

	public function indexProfesores()
	{
		// Obtener todos los usuarios con el rol de profesor
		$profesores = User::where('role', 'profesor')->get();

		// Pasar los profesores a la vista
		return view('user.index-profesores', compact('profesores'));
	}
}
