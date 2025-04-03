<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
	public function index()
	{
		$users = User::withCount(['threads', 'replies'])
			->with(['receivedThreadLikes', 'receivedReplyLikes'])
			->get();

		// Add the total likes received to each user
		foreach ($users as $user) {
			$user->thread_likes_received = $user->receivedThreadLikes->count();
			$user->reply_likes_received = $user->receivedReplyLikes->count();
			$user->total_likes_received = $user->thread_likes_received + $user->reply_likes_received;
		}

		return view('admin.dashboard', compact('users'));
	}
}
