<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (!auth()->guard('admin')->check()){
            flash("Vous devez être connecté en tant qu'administrateur pour voir cette page.")->error();
            return redirect('/connexion');
        }
        return $next($request);
    }
}
