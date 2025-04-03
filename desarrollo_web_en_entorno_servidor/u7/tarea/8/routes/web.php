<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsignaturaController;

Route::get('/', fn () => view('index'))->name('index');

Route::middleware(['auth', 'role:profesor'])->group(function () {
	Route::get('/profesor/asignaturas', [AsignaturaController::class, 'indexProfesor'])->name('asignatura.index.profesor');
});

Route::middleware(['auth', 'role:alumno'])->group(function () {
	Route::get('/alumno/asignaturas', [AsignaturaController::class, 'indexAlumno'])->name('asignatura.index.alumno');
	Route::post('/asignatura/inscripcion/{id}', [AsignaturaController::class, 'enroll'])->name('asignatura.enroll');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
	Route::get('/alumnos', [AdminController::class, 'indexAlumnos'])->name('alumnos.index');
	Route::get('/profesores', [AdminController::class, 'indexProfesores'])->name('profesores.index');
	Route::get('/admin/asignaturas', [AsignaturaController::class, 'indexAdmin'])->name('asignatura.index.admin');
});

Route::middleware(['auth', 'role:profesor,admin'])->group(function () {
	Route::get('/asignatura/{id}', [AsignaturaController::class, 'show'])->name('asignatura.show');
	Route::post('/asignatura', [AsignaturaController::class, 'store'])->name('asignatura.store');
	Route::get('/crear', [AsignaturaController::class, 'create'])->name('asignatura.create');
});

require __DIR__.'/auth.php';
