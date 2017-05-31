<?php

namespace App\Http\Controllers\Client\Admin;

use App\Models\Clients\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    public function index(){
        $data = [];
        $data['total_inv'] = Invoice::count();
        $data['total_paid'] = Invoice::whereStatus(1)->count();
        $data['total_pend'] = Invoice::whereStatus(0)->count();
        $data['amount_by_cur'] =Invoice::with('currency')->selectRaw('currency_id,SUM(amount)')->groupBy('currency_id')->get();
        $data['officer'] = Session::get('client_admin_officer')->first_name.' '.Session::get('client_admin_officer')->last_name;

        return view('client.admin.dashboard',['data'=>$data]);

    }
}
