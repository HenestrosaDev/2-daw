<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use InterventionImage;

class FilmController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('layouts.film.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|string|max:255',
			'director' => 'required|string|max:255',
			'description' => 'required|string',
			'runtime' => 'required|integer|min:1|max:999',
			'release_year' => 'required|date_format:Y|after_or_equal:1900',
			'poster' => 'nullable|image',
		]);

		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}

		$film = Film::make($validator->safe()->except(['poster']));

		if (!empty($validator->validated()['poster'])) {
			$poster_file = $validator->validated()['poster'];
			$name = "{$film->slug}.{$poster_file->getClientOriginalExtension()}";
			InterventionImage::make($validator->validated()['poster'])
				->resize(220, 330)
				->save(public_path('/images/posters/') . $name);

			$image = Image::create(['path' => "images/posters/{$name}"]);
			$film->image_id = $image->id;
		}

		$film->save();

		return redirect()->route('index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $slug
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug)
	{
		$film = Film::where('slug', $slug)->firstOrFail();
		return view('layouts.film.show', compact('film'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$film = Film::findOrFail($id);

		$path = $film->image->path;
		if (!empty($path) && !strpos($path, '/default.png')) {
			if (File::exists(public_path($path))) {
				$image_id = $film->image->id;
				$film->delete();
				Image::find($image_id)->delete();
				File::delete(public_path($path));
			} else {
				dd("{$path} no existe.");
			}
		} else {
			$film->delete();
		}

		return redirect(RouteServiceProvider::HOME);
	}
}
