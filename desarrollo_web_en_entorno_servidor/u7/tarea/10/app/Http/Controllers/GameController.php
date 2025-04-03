<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
	protected $gameService;

	public function __construct(GameService $gameService)
	{
		$this->gameService = $gameService;
	}

	// Show the list of games and user statistics
	public function index()
	{
		$games = Game::where('challenger_id', Auth::id())
			->orWhere('challenged_id', Auth::id())
			->orderBy('updated_at', 'desc')
			->get();

		$user = Auth::user();
		$winPercentage = $user->games_played > 0 ? ($user->wins / $user->games_played) * 100 : 0;

		$users = User::where('id', '!=', Auth::id())->get(); // Get users excluding the authenticated user

		return view('game.index', compact('games', 'winPercentage', 'users'));
	}

	// Create a new game challenge
	public function challenge(Request $request)
	{
		$request->validate([
			'challenged_id' => 'required|exists:users,id',
			'choice' => 'required|in:rock,paper,scissors,lizard,spock'
		]);

		Game::create([
			'challenger_id' => Auth::id(),
			'challenged_id' => $request->challenged_id,
			'challenger_choice' => $request->choice
		]);

		return redirect()->route('game.index');
	}

	// Respond to a game challenge
	public function respond(Request $request, Game $game)
	{
		$request->validate([
			'choice' => 'required|in:rock,paper,scissors,lizard,spock'
		]);

		if ($game->challenged_id != Auth::id() || $game->challenged_choice != null) {
			return redirect()->route('game.index');
		}

		$result = $this->gameService->getResult($game->challenger_choice, $request->choice);
		$game->update([
			'challenged_choice' => $request->choice,
			'result' => $result
		]);

		// Update statistics for both users
		$this->updateUserStatistics($game, $result);

		return redirect()->route('game.index');
	}

	// Show rankings
	public function rankings()
	{
		$users = User::all()->sortByDesc(function ($user) {
			return $user->wins;
		});

		$mostWins = $users->sortByDesc('wins')->values();
		$mostGames = $users->sortByDesc('games_played')->values();

		return view('game.rankings', compact('mostWins', 'mostGames'));
	}

	// Update user statistics based on the game result
	protected function updateUserStatistics(Game $game, $result)
	{
		$challenger = $game->challenger;
		$challenged = $game->challenged;

		$challenger->games_played++;
		$challenged->games_played++;

		if ($result == 'win') {
			$challenger->wins++;
		} elseif ($result == 'lose') {
			$challenged->wins++;
		}

		$challenger->save();
		$challenged->save();
	}
}
