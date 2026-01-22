<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // If user just logged in (was redirected to /dashboard), send them to role-specific dashboard
        if ($request->path() === 'dashboard' && $request->user()) {
            if ($request->user()->role === 'admin') {
                return redirect('/admin/traders');
            } elseif ($request->user()->role === 'landlord') {
                return redirect('/landlord/dashboard');
            }
        }

        return $response;
    }
}
