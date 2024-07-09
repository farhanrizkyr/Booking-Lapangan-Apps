<?php

namespace App\Http\Middleware\Admin;
use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role == Admin::ROLE_ADMIN) {
            return $next($request);
        }
    
       return redirect('apps-admin/dashboard');
    }
}
