<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->user('sanctum'));
        // dd($request->user('sanctum') == null);
        // Klo user sdh ter-autentikasi (sdh punya token)
        if ($request->user('sanctum') == null) {
            return $next($request);
        }
        return response()->json(['message' => 'Forbidden.'], 403);
    }
}
