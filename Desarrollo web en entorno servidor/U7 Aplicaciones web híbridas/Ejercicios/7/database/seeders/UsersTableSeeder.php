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
			'name'			=> 'Client 1',
			'email'			=> 'client1@example.com',
			'password'	=> Hash::make('1234'),
			'role'			=> 'client',
		]);

		User::create([
			'name'			=> 'Client 2',
			'email'			=> 'client2@example.com',
			'password'	=> Hash::make('1234'),
			'role'			=> 'client',
		]);
	}
}
