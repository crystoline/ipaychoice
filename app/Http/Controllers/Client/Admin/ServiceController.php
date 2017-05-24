<?php

namespace App\Http\Controllers\Client\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Service;
use Session;

class CustomerController extends Controller
{
    public function index()
    {
    	$services = Service::all();
        return view('client.admin.services',['services' => $services]);
    }
}
