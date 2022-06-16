<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isFranchiseManagerOrStaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role_id == Role::IS_FRANCHISE_MANAGER || Auth::user()->role_id == Role::IS_FRANCHISE_STAFF)) {
            return $next($request);
        } else {
            return redirect()->route("login");
        }
    }
}
