<?php

namespace App\Http\Controllers;

use App\Models\VideoGame;
use Illuminate\Http\Request;

class VideoGameController extends Controller
{
	public function index()
	{
		$games = VideoGame::all();
		return view('games.index', compact('games'));
	}

	public function indexAdmin()
	{
		$games = VideoGame::all();
		return view('games.index-admin', compact('games'));
	}

	public function create()
	{
		return view('games.add');
	}

	public function store(Request $request)
	{
		// Validate input
		$validated = $request->validate([
			'isan'				=> 'required|unique:video_games',
			'title'				=> 'required',
			'developer'		=> 'required',
			'distributor'	=> 'required',
			'genre'				=> 'required',
			'year'				=> 'required|integer',
		]);

		// Create new game
		VideoGame::create($validated);

		return redirect()->route('games.admin.index');
	}

	public function edit($id)
	{
		$game = VideoGame::findOrFail($id);
		return view('games.edit', compact('game'));
	}

	public function update(Request $request, $id)
	{
		// Validate input
		$validated = $request->validate([
			'title'				=> 'required',
			'developer'		=> 'required',
			'distributor'	=> 'required',
			'genre'				=> 'required',
			'year'				=> 'required|integer',
		]);

		// Update game
		$game = VideoGame::findOrFail($id);
		$game->update($validated);

		return redirect()->route('games.admin.index');
	}

	public function destroy($id)
	{
		$game = VideoGame::findOrFail($id);
		$game->delete();

		return redirect()->route('games.admin.index');
	}
}