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

	public function challengedGames()
	{
		return $this->hasMany(Game::class, 'challenged_id');
	}

	public function challengerGames()
	{
		return $this->hasMany(Game::class, 'challenger_id');
	}

	// Method to get the count of wins
	public function getWinsAttribute()
	{
		$winsAsChallenger = Game::where('challenger_id', $this->id)->where('result', 'win')->count();
		$winsAsChallenged = Game::where('challenged_id', $this->id)->where('result', 'lose')->count();

		return $winsAsChallenger + $winsAsChallenged;
	}

	// Method to get the count of games played
	public function getGamesPlayedAttribute()
	{
		return Game::where(function ($query) {
				$query->where('challenger_id', $this->id)
					->orWhere('challenged_id', $this->id);
			})
			->whereNotNull('result')
			->count();
	}
}
