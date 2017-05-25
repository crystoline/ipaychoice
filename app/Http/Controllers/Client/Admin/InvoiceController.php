<?php

namespace App\Http\Controllers\Client\Admin;

use App\Http\Requests\Client\Admin\InvoiceRequest;
use App\Models\Clients\InvoiceItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Invoice;
use App\Models\Clients\Officer;
use App\Models\Clients\Customer;
use App\Models\Clients\Service;
use App\Models\Clients\Town;
use Session;

class InvoiceController extends Controller
{
    public function index()
    {
    	$invoices = Invoice::all();
        return view('client.admin.invoices',['invoices' => $invoices]);
    }

    public function show($id) {
        $invoice = Invoice::with('customer','invoice_items')->find($id)->toArray();
        return view('client.admin.show_invoice',['invoice' => $invoice]);
    }

    public function create()
    {
    	$officer = Session::get('client_admin_officer');
    	
    	$permissions = Officer::find($officer->id)->permissions;

    	$towns_array=[];
    	foreach ($permissions as $p) {
    		$towns_array[] = $p->id;
    	}

    	$customers = Customer::whereIn('town_id',$towns_array)->get();
        $towns = Town::whereIn('id',$towns_array)->get();
    	$services = Service::all();

    	$invoice_no = '30'.time().rand(100,999);
        return view('client.admin.new_invoice',['customers' => $customers,'services' => $services,'towns'=>$towns,'invoice_no'=>$invoice_no]);
    }

    public function store(InvoiceRequest $request) {
        $total = 0;
        $service_ids = [];

        for ($i=0;$i < count($request->item);$i++) {
            $amount = $request->quantity[$i] *$request->price[$i];
            $total += $amount;
        }

        for ($i=0;$i < count($request->item);$i++) {
            if ($request->type[$i] == 'new') {
                $service = Service::create([
                    'name' => $request->item[$i],
                    'price' => $request->price[$i],
                    'description' => $request->desc[$i],
                ]);
                $service_ids[$i] = $service->id;
            } elseif ($request->type[$i] == 'not_new') {
                $service = Service::whereName($request->item[$i])->first();
                $service_ids[$i] = $service->id;
            }
        }

        $invoice = Invoice::create([
            'invoice_no' => $request->invoice_no,
            'amount' => $total,
            'status' => 0,
            'note' => $request->note,
            'customer_id' => $request->customer,
            'officer_id' => Session::get('client_admin_officer')->id
        ]);

        $invoice_id = $invoice->id;

        for ($i=0;$i < count($request->item);$i++) {
            InvoiceItem::create([
                'amount' => $request->price[$i],
                'quantity' =>$request->quantity[$i],
                'service_id' =>$service_ids[$i],
                'invoice_id' =>$invoice_id
            ]);
        }
        return redirect()->action('Client\Admin\InvoiceController@index')->with('status', 'Invoice created and sent successfully!');
    }
}
