<?php

namespace App\Models\Traits;

use App\Models\Like;

trait Likeable
{
	/**
	 * Get the count of likes for the thread.
	 */
	public function getLikesCountAttribute()
	{
		return $this->likes()->count();
	}

	/**
	 * Check if the reply is liked by a specific user.
	 *
	 * @param  int  $userId
	 * @return bool
	 */
	public function isLikedByUser($userId): bool
	{
		return $this->likes()->where('user_id', $userId)->exists();
	}

	/**
	 * Relationship for likes.
	 */
	public function likes()
	{
		return $this->morphMany(Like::class, 'likeable');
	}

	/**
	 * Like the reply.
	 *
	 * @return ?Like
	 */
	public function getLikeByUser(?int $user_id = null): ?Like
	{
		return $this->likes()->where(
			'user_id', 
			$user_id ?? auth()->id()
		)->first();
	}

	/**
	 * Like the reply.
	 *
	 * @return void
	 */
	public function like()
	{
		$this->likes()->updateOrCreate([
			'user_id' => auth()->id(),
		]);
	}

	/**
	 * Unlike the reply.
	 *
	 * @return void
	 */
	public function unlike()
	{
		$this->likes()->where('user_id', auth()->id())->delete();
	}
}
