<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request,Client $client){
        return view('pages.client-dashboard')->with(['client'=> $client]);
    }
}
