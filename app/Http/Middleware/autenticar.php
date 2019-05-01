<?php

namespace App\Http\Middleware;

use Closure;

class autenticar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if($_SESSION["usuario"]!=1)
       {
        
        return redirect('inicio');
       };
        session_start();
        return $next($request);
    }
}
