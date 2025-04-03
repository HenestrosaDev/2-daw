<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Thread;

class ReplyController extends Controller
{
	/**
	 * Store a newly created reply in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Thread  $thread
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Thread $thread)
	{
		// Validate the request data
		$request->validate([
			'body' => 'required|string|max:2000',
		]);

		// Create the reply associated with the authenticated user and the thread
		$thread->replies()->create([
			'user_id' => auth()->id(),
			'body' => $request->body,
			'thread_id' => $thread->id,
		]);

		// Redirect back to the thread page with a success message
		return redirect()->route('thread.show', $thread)->with('status', '¡Respuesta publicada correctamente!');
	}

	/**
	 * Remove the specified reply from storage.
	 *
	 * @param  \App\Models\Thread  $thread
	 * @param  \App\Models\Reply  $reply
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Thread $thread, Reply $reply)
	{
		// Delete the reply
		$reply->delete();

		// Redirect back to the thread page with a success message
		return redirect()->route('thread.show', $thread)->with('status', '¡Respuesta eliminada correctamente!');
	}

	/**
	 * Store a newly created like in storage for a reply.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Reply  $reply
	 * @return \Illuminate\Http\Response
	 */
	public function like(Reply $reply)
	{
		// Check if the user has already liked the reply
		if ($reply->getLikeByUser()) {
			return redirect()->back()->with('status', 'Ya has marcado esta respuesta como "me gusta".');
		}

		// Create a like associated with the authenticated user and the reply
		$reply->like();

		// Redirect back to the thread page with a success message
		return redirect()->route('thread.show', $reply->thread_id)->with('status', '¡Respuesta marcada como "me gusta" correctamente!');
	}

	/**
	 * Remove the specified like from storage for a reply.
	 *
	 * @param  \App\Models\Reply  $reply
	 * @return \Illuminate\Http\Response
	 */
	public function unlike(Reply $reply)
	{
		// Check if the user has liked the reply
		$like = $reply->getLikeByUser();

		if (!$like) {
			return redirect()->back()->with('status', 'No tienes marcada esta respuesta como "me gusta".');
		}

		$like->delete();

		// Redirect back to the thread page with a success message
		return redirect()->route('thread.show', $reply->thread_id)->with('status', '¡Respuesta desmarcada como "me gusta" correctamente!');
	}
}
