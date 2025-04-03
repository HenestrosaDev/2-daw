<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
	public function handle($request, Closure $next)
	{
		if (Auth::check() && Auth::user()->isAdmin()) {
			return $next($request);
		}

		return redirect('/'); // Redirect to home if not admin
	}
}
