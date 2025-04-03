<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'user_id',
	];

	/**
	 * Get the parent likeable model (thread or reply).
	 */
	public function likeable()
	{
		return $this->morphTo();
	}

	/**
	 * Get the user that owns the like.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
