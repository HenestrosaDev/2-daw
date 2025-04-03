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
		Schema::create('games', function (Blueprint $table) {
			$table->id();
			$table->foreignId('challenger_id')->constrained('users')->onDelete('cascade');
			$table->foreignId('challenged_id')->constrained('users')->onDelete('cascade');
			$table->enum('challenger_choice', ['rock', 'paper', 'scissors', 'lizard', 'spock']);
			$table->enum('challenged_choice', ['rock', 'paper', 'scissors', 'lizard', 'spock'])->nullable();
			$table->enum('result', ['win', 'lose', 'draw'])->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('games');
	}
};
