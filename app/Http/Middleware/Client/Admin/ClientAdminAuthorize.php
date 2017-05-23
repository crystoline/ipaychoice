<?php

namespace App\Http\Middleware\Client\Admin;

use Closure;

class ClientAdminAuthorize
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
        if (!session()->has('client_admin_officer')) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('client.admin.login');
            }
        }

        return $next($request);
    }
}
