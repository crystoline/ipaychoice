<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\Service;
use Illuminate\Http\Request;

class DashboardServiceController extends Controller
{
    //
    public function index(Client $client){
        return view('pages.dashboard.service.index')->with(['services'=>Service::get()]);
    }
    public function get(Client $client, Service $service){

    }

    public function create(Client $client){

    }
    public function store(Client $client){

    }
    public function edit(Client $client, Service $service){

    }
    public function update(Client $client, Service $service){

    }
}
