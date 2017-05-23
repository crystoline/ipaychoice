<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\State;
use Illuminate\Http\Request;

class DashboardLocationController extends Controller
{

    public function states(Request $request, Client $client){
        return view('pages.dashboard.location.states')->with(['states'=>State::get(), 'client' => $client]);
    }
}
