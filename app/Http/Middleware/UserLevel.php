<?php

namespace App\Http\Middleware;

use Closure;

class UserLevel
{
    
    public function handle($request, Closure $next)
    {
        if(auth()->user()->level == 1 || auth()->user()->access_reportes == "on"){
         return $next($request);
        }else{
            return redirect()->route('add-category');
        }

    }
}