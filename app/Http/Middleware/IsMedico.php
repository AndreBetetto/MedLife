<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsMedico
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            $role = Auth::user()->role;
            if(!empty($role)) {
                if($role == 'admin' || $role == 'medico') {
                    return $next($request);
                }
                else {
                    return response('not allowed to take this action', 500);           
                }
            }
        }
        return response('not allowed to take this action', 500);
    }

}

