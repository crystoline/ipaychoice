<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClientDashboard
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
        $client = $request->route('client');
        $user = Auth::user();
        if(!$client or $client->user_id != $user->id){
            return redirect()->route('user.not_found.client');
        }

        config(['database.connections.mysql_client.database' => $client->configuration->database]);
        return $next($request);
    }
}
