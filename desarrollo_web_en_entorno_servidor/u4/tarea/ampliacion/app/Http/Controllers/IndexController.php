<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	/**
	 * Returns the index page and passes the films to the view 
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$films = Film::all();
		return view('layouts.index', compact('films'));
	}
}
