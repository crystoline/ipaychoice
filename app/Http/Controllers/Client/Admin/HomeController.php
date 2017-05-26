<?php

namespace App\Http\Controllers\Client\Admin;

use App\Models\Clients\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data = [];
        $data['total_inv'] = Invoice::count();
        $data['total_paid'] = Invoice::whereStatus(1)->count();
        $data['total_pend'] = Invoice::whereStatus(0)->count();

        return view('client.admin.dashboard');
    }
}
