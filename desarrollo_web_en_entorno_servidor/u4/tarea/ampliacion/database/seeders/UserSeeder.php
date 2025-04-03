<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			"role_id" => 1,
			"name" => "admin",
			"email" => "admin@admin.com",
			"password" => Hash::make("123456789"),
		]);

		User::create([
			"role_id" => 2,
			"name" => "user",
			"email" => "user@user.com",
			"password" => Hash::make("123456789"),
		]);
	}
}
