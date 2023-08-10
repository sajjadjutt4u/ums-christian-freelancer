<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MainAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $login_status = session('login_status');

        if($login_status === 'user' ){
            return redirect()->route('user_dashboard');
        }elseif ($login_status === 'company' ){
            return redirect()->route('company_dashboard');
        }

        return $next($request);
    }
}
