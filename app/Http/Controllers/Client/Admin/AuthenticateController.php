<?php

namespace App\Http\Controllers\Client\Admin;

use App\Http\Requests\Client\Admin\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class AuthenticateController extends Controller
{
    public function login(){
        return view('client.admin.login');
    }

    public function doLogin(LoginRequest $request){
        return redirect()->action('Client\Admin\HomeController@index');

    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->action('Client\Admin\AuthenticateController@login');
    }

}
