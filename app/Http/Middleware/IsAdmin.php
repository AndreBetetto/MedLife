<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Checa se usuário está autenticado
        if(Auth::check()){
                $role = Auth::user()->role;
            //Checa se usuário é admin
            if(!empty($role)) {
                if($role == 'admin') {
                    //Sucesso, admin passa pra próxima rota
                    return $next($request);
                }
            } else {
                //Erro caso usuário não esteja autenticado como admin
                return response('not allowed to take this action', 500);            }
        } 
        //Erro caso usuário não esteja autenticado como admin
        return response('not allowed to take this action', 500);
    }
}
