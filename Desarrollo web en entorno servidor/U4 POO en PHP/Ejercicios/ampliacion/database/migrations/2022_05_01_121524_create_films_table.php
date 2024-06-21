<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('films', function (Blueprint $table) {
			$table->id();
			$table->foreignId('image_id')->default(1)->constrained();
			$table->tinyText('name');
			$table->string('slug', 255)->unique();
			$table->tinyText('director');
			$table->text('description');
			$table->unsignedSmallInteger('runtime');
			$table->year('release_year');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('films');
	}
};
