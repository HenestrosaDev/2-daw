<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class ThreadController extends Controller
{
	/**
	 * Display a listing of the thread.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// Fetch all threads with their associated user and paginate them
		$threads = Thread::with('user')->latest()->paginate(10);

		// Return the index view with the threads
		return view('thread.index', compact('threads'));
	}

	/**
	 * Show the form for creating a new thread.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('thread.create');
	}

	/**
	 * Store a newly created thread in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Validate the request data
		$request->validate([
			'title' => 'required|string|max:255',
			'body' => 'required|string|max:5000',
		]);

		// Create a new thread associated with the authenticated user
		Thread::create([
			'user_id' => auth()->id(),
			'title' => $request->title,
			'body' => $request->body,
		]);

		// Redirect to the threads index with a success message
		return redirect()->route('thread.index')->with('status', '¡Hilo creado correctamente!');
	}

	/**
	 * Display the specified thread.
	 *
	 * @param  \App\Models\Thread  $thread
	 * @return \Illuminate\Http\Response
	 */
	public function show(Thread $thread)
	{
		// Load the replies with the user for the specified thread
		$thread->load('replies.user');

		// Return the show view with the thread
		return view('thread.show', compact('thread'));
	}

	/**
	 * Show the form for editing the specified thread.
	 *
	 * @param  \App\Models\Thread  $thread
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Thread $thread)
	{
		// Return the edit view with the thread
		return view('thread.edit', compact('thread'));
	}

	/**
	 * Update the specified thread in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Thread  $thread
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Thread $thread)
	{
		// Validate the request data
		$request->validate([
			'title' => 'required|string|max:255',
			'body' => 'required|string|max:5000',
		]);

		// Update the thread with the validated data
		$thread->update([
			'title' => $request->title,
			'body' => $request->body,
		]);

		// Redirect to the thread with a success message
		return redirect()->route('thread.show', $thread)->with('status', '¡Hilo actualizado correctamente!');
	}

	/**
	 * Remove the specified thread from storage.
	 *
	 * @param  \App\Models\Thread  $thread
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Thread $thread)
	{
		// Delete the thread
		$thread->delete();

		// Redirect to the threads index with a success message
		return redirect()->route('thread.index')->with('status', '¡Hilo eliminado correctamente!');
	}

	/**
	 * Store a newly created like in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Thread  $thread
	 * @return \Illuminate\Http\Response
	 */
	public function like(Thread $thread)
	{
		// Check if the user has already liked the thread
		if ($thread->getLikeByUser()) {
			return redirect()->back()->with('status', '¡Ya has marcado este hilo como "me gusta"!');
		}

		// Create a like associated with the authenticated user and the thread
		$thread->like();

		// Redirect back to the thread page with a success message
		return redirect()->route('thread.index')->with('status', '¡Hilo marcado como "me gusta" correctamente!');
	}

	/**
	 * Remove the specified like from storage.
	 *
	 * @param  \App\Models\Thread  $thread
	 * @return \Illuminate\Http\Response
	 */
	public function unlike(Thread $thread)
	{
		// Check if the user has liked the thread
		$like = $thread->getLikeByUser();

		if (!$like) {
			return redirect()->back()->with('status', 'No tienes marcado este hilo como "me gusta".');
		}

		// Delete the like
		$like->delete();

		// Redirect back to the thread page with a success message
		return redirect()->route('thread.index')->with('status', '¡Hilo desmarcado como "me gusta" correctamente!');
	}
}
