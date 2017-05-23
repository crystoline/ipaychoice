<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\Officer;
use Illuminate\Http\Request;

class DashboardOfficerController extends Controller
{
    public function index(Request $request, Client $client){
        config(['database.connections.mysql_client.database' => $client->configuration->database]);
        return view('pages.dashboard.officer.index')->with(['officers'=>Officer::get()]);
    }
}
