<?php

namespace App\Services;

class GameService
{
	protected $choices = ['rock', 'paper', 'scissors', 'lizard', 'spock'];

	protected $rules = [
		'rock' => ['scissors', 'lizard'],
		'paper' => ['rock', 'spock'],
		'scissors' => ['paper', 'lizard'],
		'lizard' => ['spock', 'paper'],
		'spock' => ['scissors', 'rock']
	];

	public function getResult($choice1, $choice2)
	{
		if ($choice1 == $choice2) {
			return 'draw';
		}

		return in_array($choice2, $this->rules[$choice1]) ? 'win' : 'lose';
	}
}
