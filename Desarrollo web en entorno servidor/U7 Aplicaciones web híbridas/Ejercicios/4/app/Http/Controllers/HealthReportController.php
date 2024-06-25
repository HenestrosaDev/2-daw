<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthReportController extends Controller
{
	public function index()
	{
		return view('health-report');
	}

	public function calculate(Request $request)
	{
		$request->validate([
			'gender' => 'required|in:male,female',
			'age' => 'required|integer|min:1',
			'height' => 'required|numeric|min:1',
			'weight' => 'required|numeric|min:1',
		]);

		$gender = $request->input('gender');
		$age = $request->input('age');
		$height = $request->input('height');
		$weight = $request->input('weight');

		// Calculate BMI
		$bmi = $weight / (($height / 100) ** 2);

		// Calculate BMR (Basal Metabolic Rate) using Mifflin-St Jeor Equation
		if ($gender == 'male') {
			$bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
		} else {
			$bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
		}

		return redirect()->route('health-report')->with('report', [
			'bmi' => round($bmi, 2),
			'bmr' => round($bmr, 2),
		]);
	}
}
