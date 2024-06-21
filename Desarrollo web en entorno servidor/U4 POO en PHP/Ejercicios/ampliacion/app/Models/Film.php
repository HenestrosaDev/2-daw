<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
	use HasFactory;

	protected $fillable = [
		'image_id',
		'name',
		'director',
		'description',
		'runtime',
		'release_year'
	];

	/**
	 * Create the slug when titling a film.
	 *
	 * @param  string  $value
	 * @return \Illuminate\Database\Eloquent\Casts\Attribute
	 */
	protected function name(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value,
			set: fn ($value) => [
				'name' => $value,
				'slug' => Str::slug($value)
			]
		);
	}

	public function image()
	{
		return $this->belongsTo(Image::class);
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
