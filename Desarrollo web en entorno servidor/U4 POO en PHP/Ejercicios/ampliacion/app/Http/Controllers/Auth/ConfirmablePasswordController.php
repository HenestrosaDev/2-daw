<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConfirmablePasswordController extends Controller
{
	/**
	 * Show the confirm password view.
	 *
	 * @return \Illuminate\View\View
	 */
	public function show()
	{
		return view('layouts.auth.confirm-password');
	}

	/**
	 * Confirm the user's password.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed
	 */
	public function store(Request $request)
	{
		$credentials = [
			'email' => $request->user()->email,
			'password' => $request->password,
		];

		if (!Auth::guard('web')->validate($credentials)) {
			throw ValidationException::withMessages([
				'password' => __('auth.password'),
			]);
		}

		$request->session()->put('auth.password_confirmed_at', time());

		return redirect()->intended(RouteServiceProvider::HOME);
	}
}
