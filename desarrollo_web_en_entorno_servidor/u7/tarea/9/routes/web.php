<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;

Route::get('/', fn () => view('index'))->name('index');
Route::get('threads', [ThreadController::class, 'index'])->name('thread.index');
Route::get('thread/{thread}', [ThreadController::class, 'show'])->name('thread.show');

Route::middleware(['auth'])->group(function () {
	Route::get('threads/create', [ThreadController::class, 'create'])->name('thread.create');
	Route::post('threads', [ThreadController::class, 'store'])->name('thread.store');
	Route::delete('thread/{thread}', [ThreadController::class, 'destroy'])->name('thread.destroy');
	Route::post('threads/{thread}/like', [ThreadController::class, 'like'])->name('thread.like');
	Route::delete('threads/{thread}/unlike', [ThreadController::class, 'unlike'])->name('thread.unlike');

	Route::post('reply/{thread}', [ReplyController::class, 'store'])->name('reply.store');
	Route::delete('reply/{thread}/{reply}', [ReplyController::class, 'destroy'])->name('reply.destroy');
	Route::post('reply/{reply}/like', [ReplyController::class, 'like'])->name('reply.like');
	Route::delete('reply/{reply}/unlike', [ReplyController::class, 'unlike'])->name('reply.unlike');
});

Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

require __DIR__ . '/auth.php';
