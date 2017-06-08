<?php

namespace App\Http\Middleware\Client;

use App\Models\Configuration;
use Closure;
use Illuminate\Support\Facades\Artisan;

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


            $conf = Configuration::with('client')->where(['subdomain'=>$subdomain])->get()->first();

        }else{
            $conf = Configuration::with('client')->where(['domain'=>$domain])->get()->first();
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
        $this->checkForMigration();

        return $next($request);
    }

    private function checkForMigration(){
        //check status
        Artisan::call('migrate:status', ['--database' => 'mysql_client', '--path' => 'database/migrations/clients']);
        if(strpos(Artisan::output(),'| N' )){ //migration exist
            Artisan::call('migrate', ['--database' => 'mysql_client', '--path' => 'database/migrations/clients']);
        }
    }
}
