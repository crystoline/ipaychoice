<?php

namespace App\Http\Middleware\Client\Admin;

use Closure;

class AllowClientAdmin
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
        $route = $request->route();
        $domain = $route->parameter('domain');


        return $next($request);
    }
}
