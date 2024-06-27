<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
	protected $fillable = [
		'nombre', 
		'profesor_id'
	];

	public function profesor()
	{
		return $this->belongsTo(User::class);
	}

	public function alumnos()
	{
		return $this->belongsToMany(User::class, 'alumno_asignatura', 'asignatura_id', 'alumno_id');
	}

	public function isEnrolled($userId)
	{
		return $this->alumnos()->where('alumno_id', $userId)->exists();
	}
}
