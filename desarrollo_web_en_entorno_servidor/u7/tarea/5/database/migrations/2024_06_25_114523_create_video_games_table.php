<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('video_games', function (Blueprint $table) {
			$table->id();
			$table->string('isan')->unique();
			$table->string('title');
			$table->string('developer');
			$table->string('distributor');
			$table->string('genre');
			$table->integer('year');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('video_games');
	}
};
