<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  mixed $roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        foreach ($roles as $role) {
            // dd($user, $user['level_user'], $role);
            if ($user['level_user'] == $role) {
                return $next($request);
            }
        }
        $message = 'Forbidden. User doesn\'t have the permission to access the resource.';
        return response()->json(['message' => $message], 403);
    }
}
