<?php

namespace App\Http\Middleware\Client;

use App\Models\Configuration;
use Closure;

class AllowClient{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $server = $request->server();
        $domain = $server['HTTP_HOST'];
        //check by subdomain name
        if($pos = strpos($domain, env('APP_DOMAIN')) and $subdomain = substr($domain, 0, $pos -1)){


            $conf = Configuration::where(['subdomain'=>$subdomain])->get()->first();

        }else{
            $conf = Configuration::where(['domain'=>$domain])->get()->first();
        }
        //check by full domain name
        if(!$conf){
            //branch to FrontendRoute
            //$request->session()->flash('domain',$request->url());
            return redirect()->action('\App\Http\Controllers\Client\NotFoundController@wrongDomain')->with(['domain'=> $request->url()]);
        }else{
            $old  = session('client.configuration', false);
            if( !$old or $conf->database != $old->database ){
                session(['client.configuration' => $conf]);
            }
        }
        config(['database.connections.mysql_client.database' =>$conf->database]);

        return $next($request);
    }
}
