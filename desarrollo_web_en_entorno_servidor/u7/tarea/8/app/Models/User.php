<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'nombre',
		'apellido1',
		'apellido2',
		'email',
		'password',
		'role',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
		];
	}

	public function getNombreCompletoAttribute()
	{
		return "{$this->nombre} {$this->apellido1} {$this->apellido2}";
	}

	public function asignaturas()
	{
		return $this->belongsToMany(Asignatura::class, 'alumno_asignatura', 'alumno_id', 'asignatura_id');
	}

	public function isAdmin()
	{
		return $this->role === 'admin';
	}

	public function isProfesor()
	{
		return $this->role === 'profesor';
	}

	public function isAlumno()
	{
		return $this->role === 'alumno';
	}
}
