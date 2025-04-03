<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likeable;

class Reply extends Model
{
	use HasFactory, Likeable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'thread_id',
		'user_id',
		'body',
	];

	/**
	 * Boot the model.
	 */
	protected static function boot()
	{
		parent::boot();

		static::deleting(function ($reply) {
			// Delete related likes
			$reply->likes()->delete();
		});
	}

	/**
	 * Get the thread that belongs to the reply.
	 */
	public function thread()
	{
		return $this->belongsTo(Thread::class);
	}

	/**
	 * Get the user that owns the reply.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get all of the reply's likes.
	 */
	public function likes()
	{
		return $this->morphMany(Like::class, 'likeable');
	}
}
