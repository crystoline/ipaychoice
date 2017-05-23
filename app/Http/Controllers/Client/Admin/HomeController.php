<?php

namespace App\Http\Controllers\Client\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('client.admin.dashboard');
    }
}
