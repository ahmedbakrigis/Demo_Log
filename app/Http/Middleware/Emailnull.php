<?php

namespace App\Http\Middleware;

use Closure;

class Emailnull
{
    public function handle($request, Closure $next)
    {
        if (!request()->has('email')){
            return redirect('null');
        }elseif (request('email')==null){
            return redirect('null');
        }
        return $next($request);
    }
}
