<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', fn () => redirect()->route('books.index'));

Route::resource('books', BookController::class);
