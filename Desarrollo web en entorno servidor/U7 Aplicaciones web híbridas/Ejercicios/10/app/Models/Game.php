<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	use HasFactory;

	protected $fillable = [
		'challenger_id',
		'challenged_id',
		'challenger_choice',
		'challenged_choice',
		'result'
	];

	public function challenger()
	{
		return $this->belongsTo(User::class, 'challenger_id');
	}

	public function challenged()
	{
		return $this->belongsTo(User::class, 'challenged_id');
	}

	public function scopeWins($query, $userId)
	{
		return $query->where(function ($query) use ($userId) {
			$query->where('challenger_id', $userId)
				->where('result', 'win');
		})->orWhere(function ($query) use ($userId) {
			$query->where('challenged_id', $userId)
				->where('result', 'lose');
		});
	}
}
