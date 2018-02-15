<?php

namespace App\Http\Middleware;

use Closure;

class Checkmail
{
// explain site 5msat
    public function handle($request, Closure $next)
    {
        if(request()->has('email')){
            if (request('email')==='admin@gmail.com'){
                return redirect('Cannot');
            }
        }
        return $next($request);
    }
}
