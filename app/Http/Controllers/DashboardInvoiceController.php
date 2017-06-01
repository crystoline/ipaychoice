<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\Invoice;
use Illuminate\Http\Request;

class DashboardInvoiceController extends Controller
{
    public function index(Client $client){
        return view('pages.dashboard.invoice.index')->with(['client' =>$client, 'invoices'=>Invoice::get()]);
    }
    public function get(Client $client, $id){
        $invoice =  Invoice::find($id);
        return view('pages.dashboard.invoice.view')->with(['client' =>$client, 'invoice' => $invoice]);
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
