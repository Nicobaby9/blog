<?php

namespace App\Http\Middleware;

use Closure;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role)
    {
        if(in_array($request->user()->role, $role)) {
            return $next($request);
        }

        return redirect()->back()->with(['error' => 'Anda idak memiliki akses ke halaman tersebut.']);
    }
}
