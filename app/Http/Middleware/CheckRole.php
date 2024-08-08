<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role != 2) {
            return response()->json(['message' => 'Access Denied'], 403);
        }

        return $next($request);
    }
}
