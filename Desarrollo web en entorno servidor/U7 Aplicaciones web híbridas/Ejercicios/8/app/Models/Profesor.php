<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
	protected $fillable = [
		'nombre', 
		'apellido1', 
		'apellido2'
	];

	protected $table = 'profesores';

	public function asignaturas()
	{
		return $this->hasMany(Asignatura::class, 'profesor_id');
	}
}
