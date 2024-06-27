<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
		];
	}

	public function isAdmin()
	{
		return $this->role === 'admin';
	}

	public function threads()
	{
		return $this->hasMany(Thread::class);
	}

	public function replies()
	{
		return $this->hasMany(Reply::class);
	}

	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	/**
	 * Get all likes received by the user's thread.
	 */
	public function receivedThreadLikes()
	{
		return $this->hasManyThrough(Like::class, Thread::class, 'user_id', 'likeable_id')
			->where('likeable_type', Thread::class);
	}

	/**
	 * Get all likes received by the user's reply.
	 */
	public function receivedReplyLikes()
	{
		return $this->hasManyThrough(Like::class, Reply::class, 'user_id', 'likeable_id')
			->where('likeable_type', Reply::class);
	}
}
