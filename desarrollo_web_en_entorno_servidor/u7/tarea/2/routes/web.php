<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', [FormController::class, 'index'])->name('form.show');
Route::post('/formulario', [FormController::class, 'handleForm'])->name('form.handle');
Route::get('/formulario/validado', [FormController::class, 'showValidated'])->name('form.validated');
