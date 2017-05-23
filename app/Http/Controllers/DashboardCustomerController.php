<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\Customer;
use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{
    public function index(Request $request, Client $client){

        return view('pages.dashboard.customer.index')->with(['customers'=>Customer::get()]);
    }
}
