<?php

Route::get('/delete-session-{id}', [App\Http\Controllers\HomeController::class, 'delete']);
Route::get('/delete-all-sessions', [App\Http\Controllers\HomeController::class, 'deleteAll']);
Route::get('/flash', [App\Http\Controllers\HomeController::class, 'flash']);
Route::get('/regen-session-id', [App\Http\Controllers\HomeController::class, 'regenSessionId']);