<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
	public function index()
	{
		return view('form');
	}

	public function handleForm(Request $request)
	{
		$validated = $request->validate([
			'name'								=> 'required|string|max:255',
			'last_name'						=> 'required|string|max:255',
			'username'						=> 'required|string|max:32',
			'email'								=> 'nullable|email|max:255',
			'address'							=> 'required|string|max:255',
			'address2'						=> 'nullable|string|max:255',
			'country'							=> 'required|string|max:255',
			'province'						=> 'required|string|max:255',
			'zip_code'						=> 'required|string|max:20',
			'same_address'				=> 'nullable',
			'save_info'						=> 'nullable',
			'payment_method'			=> 'required|in:PayPal,Tarjeta de crédito,Tarjeta de débito',
			'cardholder_name'			=> 'required|string|max:255',
			'credit_card_number'	=> 'required|integer|digits_between:16,19',
			'expiration_date'			=> 'required|string|digits:5',
			'cvv'									=> 'required|integer|digits_between:3,4',
		]);

		return redirect()->route('form.validated')->with('validated', $validated);
	}

	public function showValidated()
	{
		$validated = session('validated');

		if (!$validated) {
			return redirect()->route('form.show');
		}

		return view('validated-form', compact('validated'));
	}
}
