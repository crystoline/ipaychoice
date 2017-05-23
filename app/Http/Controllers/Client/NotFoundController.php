<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotFoundController extends Controller
{
    public function wrongDomain(Request $request){
        /*$domain = $request->session()->get('domain');
        dd($request);
        if(!$domain)
            return redirect()->action('\App\Http\Controllers\HomeController@landing');*/
        return view('client.not_found.domain')/*->with(['domain' => $domain])*/;
    }
}
