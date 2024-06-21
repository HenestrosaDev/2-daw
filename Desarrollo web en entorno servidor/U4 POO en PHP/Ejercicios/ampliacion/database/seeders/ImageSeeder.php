<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$files = [
			'default.png',
			'barry-lyndon.jpg',
			'funny-games.jpg',
			'i-stand-alone.jpg',
			'its-such-a-beautiful-day.jpg',
			'koyaanisqatsi.jpg',
			'la-haine.jpg',
			'pi.jpg',
			'stalker.jpg',
			'taxi-driver.jpg',
			'neon-genesis-evangelion-the-end-of-evangelion.jpg',
			'waking-life.jpg',
			'world-of-tomorrow.jpg',
		];

		// Adds 'images/posters/' to each element value
		$prefixed_files = preg_filter('/^/', 'images/posters/', $files);

		foreach ($prefixed_files as $prefixed_file) {
			Image::create(['path' => $prefixed_file]);
		}
	}
}
