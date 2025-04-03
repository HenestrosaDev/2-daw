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
			'name'			=> 'Admin',
			'email'			=> 'admin@example.com',
			'password'	=> Hash::make('1234'),
			'role'			=> 'admin',
		]);

		User::create([
			'name'			=> 'Usuario',
			'email'			=> 'user@example.com',
			'password'	=> Hash::make('1234'),
			'role'			=> 'user',
		]);
	}
}
