<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
        // $fullUrl = url()->full();

        // if (!Auth::guard('user')->check() && str_contains($fullUrl, 'customer')) {
        //     return redirect()->route('customer.login');
        // }

        // if (!Auth::guard('creator')->check() && str_contains($fullUrl, 'creator')) {
        //     return redirect()->route('creator.login');
        // }

        // if (!Auth::guard('admin')->check() && str_contains($fullUrl, 'admin')) {
        //     return redirect()->route('admin.login');
        // }

        return $next($request);
    }
}
