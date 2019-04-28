<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class redirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*$host = $request->getSchemeAndHttpHost();
     
        if (substr($request->getRequestUri(), -1) != '/')
        {
            return Redirect::to(($host.$request->getRequestUri() . '/'), 301);

        }
        return $next($request);*/
    }

}