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
		Schema::create('alumno_asignatura', function (Blueprint $table) {
			$table->foreignId('alumno_id')->constrained('users')->onDelete('cascade');
			$table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('cascade');
			$table->primary(['alumno_id', 'asignatura_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('alumno_asignatura');
	}
};
