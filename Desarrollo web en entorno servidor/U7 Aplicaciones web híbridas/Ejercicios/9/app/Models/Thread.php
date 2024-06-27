<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likeable;

class Thread extends Model
{
	use HasFactory, Likeable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'title',
		'body',
		'user_id',
	];

	/**
	 * Boot the model.
	 */
	protected static function boot()
	{
		parent::boot();

		static::deleting(function ($thread) {
			// Delete related replies
			$thread->replies()->each(function ($reply) {
				$reply->delete();
			});

			// Delete related likes
			$thread->likes()->delete();
		});
	}

	/**
	 * Get the user that owns the thread.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the replies for the thread.
	 */
	public function replies()
	{
		return $this->hasMany(Reply::class);
	}

	/**
	 * Get the count of replies for the thread.
	 */
	public function getRepliesCountAttribute()
	{
		return $this->replies()->count();
	}
}
