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
			'name'			=> 'Player 1',
			'email'			=> 'player1@example.com',
			'password'	=> Hash::make('1234'),
		]);

		User::create([
			'name'			=> 'Player 2',
			'email'			=> 'player2@example.com',
			'password'	=> Hash::make('1234'),
		]);

		User::create([
			'name'			=> 'Player 3',
			'email'			=> 'player3@example.com',
			'password'	=> Hash::make('1234'),
		]);
	}
}
