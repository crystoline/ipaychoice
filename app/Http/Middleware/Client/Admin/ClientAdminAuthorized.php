<?php

namespace App\Http\Middleware\Client\Admin;

use Closure;

class ClientAdminAuthorized
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
        if (session()->has('client_admin_officer')) {
            if (!$request->ajax()) {
               return redirect()->route('client.admin.dashboard');
            }
        }
        return $next($request);
    }
}
