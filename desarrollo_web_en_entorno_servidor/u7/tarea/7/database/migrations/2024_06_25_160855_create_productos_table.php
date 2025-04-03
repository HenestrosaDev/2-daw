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
		Schema::create('productos', function (Blueprint $table) {
			$table->id('codigo');
			$table->foreignId('codigo_fabricante')->references('codigo')->on('fabricantes');
			$table->string('nombre', 100);
			$table->double('precio', 8, 2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('productos');
	}
};
