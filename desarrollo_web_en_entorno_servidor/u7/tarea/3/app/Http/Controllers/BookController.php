<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
	// Display a listing of the books.
	public function index()
	{
		$books = Book::all();
		return view('books.index', compact('books'));
	}

	// Show the form for creating a new book.
	public function create()
	{
		return view('books.create');
	}

	// Store a newly created book in storage.
	public function store(Request $request)
	{
		$request->validate([
			'ISBN'			=> 'required',
			'title'			=> 'required',
			'author'		=> 'required',
			'publisher'	=> 'required',
			'edition'		=> 'required',
			'year'			=> 'required|integer',
		]);

		Book::create($request->all());

		return redirect()->route('books.index')
			->with('success', 'Libro creado correctamente.');
	}

	// Display the specified book.
	public function show(Book $book)
	{
		return view('books.show', compact('book'));
	}

	// Show the form for editing the specified book.
	public function edit(Book $book)
	{
		return view('books.edit', compact('book'));
	}

	// Update the specified book in storage.
	public function update(Request $request, Book $book)
	{
		$request->validate([
			'ISBN'			=> 'required',
			'title'			=> 'required',
			'author'		=> 'required',
			'publisher'	=> 'required',
			'edition'		=> 'required',
			'year'			=> 'required|integer',
		]);

		$book->update($request->all());

		return redirect()
			->route('books.index')
			->with('success', 'Libro actualizado correctamente.');
	}

	// Remove the specified book from storage.
	public function destroy(Book $book)
	{
		$book->delete();

		return redirect()
			->route('books.index')
			->with('success', 'Libro eliminado correctamente.');
	}
}
