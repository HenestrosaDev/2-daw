<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HealthReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	if (auth()->check()) {
		return redirect()->route('health-report');
	} else {
		return view('welcome');
	}
})->name('index');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

	Route::get('/health-report', [HealthReportController::class, 'index'])->name('health-report');
	Route::post('/health-report', [HealthReportController::class, 'calculate'])->name('health-report.calculate');
});

require __DIR__.'/auth.php';
