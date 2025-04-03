<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		User::create([
			'nombre'		=> 'Admin',
			'apellido1'	=> 'García',
			'apellido2'	=> 'Toral',
			'email'			=> 'admin@example.com',
			'password'	=> Hash::make('1234'),
			'role'			=> 'admin',
		]);

		User::create([
			'nombre'		=> 'Profesor',
			'apellido1'	=> 'Iglesias',
			'apellido2'	=> 'Delgado',
			'email'			=> 'profesor@example.com',
			'password'	=> Hash::make('1234'),
			'role'			=> 'profesor',
		]);

		User::create([
			'nombre'			=> 'Alumno',
			'apellido1'	=> 'Carvajal',
			'apellido2'	=> 'Ramos',
			'email'			=> 'alumno@example.com',
			'password'	=> Hash::make('1234'),
			'role'			=> 'alumno',
		]);
	}
}
