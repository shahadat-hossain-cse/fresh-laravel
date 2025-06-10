<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        //print_r($roles);
        if (!empty(Auth::check()) && in_array(Auth::user()->user_type, $roles))        
        {
            
            return $next($request); 
        }
        else
        {
            Auth::logout();
            return redirect(url('user-login')); 
        }
    }
}
