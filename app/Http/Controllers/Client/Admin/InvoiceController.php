<?php

namespace App\Http\Controllers\Client\Admin;

use App\Http\Requests\Client\Admin\InvoiceRequest;
use App\Models\Client;
use App\Models\Clients\Currency;
use App\Models\Clients\InvoiceItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Invoice;
use App\Models\Clients\Officer;
use App\Models\Clients\Customer;
use App\Models\Clients\Service;
use App\Models\Clients\Town;
use Illuminate\Support\Facades\Mail;
use Session;

class InvoiceController extends Controller
{
    public function index()
    {
    	$invoices = Invoice::all();
        return view('client.admin.invoices',['invoices' => $invoices]);
    }

    public function show($id) {
        $invoice = Invoice::with('customer.town.state','invoice_items.service','currency')->find($id)->toArray();
        return view('client.admin.show_invoice',['invoice' => $invoice]);
    }

    public function customer_view($id,$invoice_no) {
        $client = Client::find($id)->name;
        $invoice = Invoice::with('customer.town.state','invoice_items.service','currency')->whereInvoiceNo($invoice_no)->first()->toArray();
        return view('client.admin.customer_invoice',['invoice' => $invoice,'client'=>$client]);
    }

    public function create()
    {
    	$officer = Session::get('client_admin_officer');
    	
    	$permissions = Officer::find($officer->id)->permissions;

    	$towns_array=[];
    	foreach ($permissions as $p) {
    		$towns_array[] = $p->town_id;
    	}

    	$customers = Customer::whereIn('town_id',$towns_array)->get();
        $towns = Town::whereIn('id',$towns_array)->get();
    	$services = Service::all();
    	$currencies = Currency::all();

    	$now = date('Y-m-d-H-i-s');
    	$now = explode('-',$now);
    	$invoice_no = implode('',$now).rand(10,99);
        return view('client.admin.new_invoice',['customers' => $customers,'services' => $services,'towns'=>$towns,'invoice_no'=>$invoice_no,'currencies'=>$currencies]);
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
            'sent' => 0,
            'note' => $request->note,
            'customer_id' => $request->customer,
            'officer_id' => Session::get('client_admin_officer')->id,
            'currency_id' => $request->currency,
            'invoice_due_date' =>$request->invoice_due_date
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
        return redirect()->action('Client\Admin\InvoiceController@index')->with('status', 'Invoice created successfully!');
    }

    public function update(InvoiceRequest $request, $id) {
        $invoice = Invoice::findOrFail($id);
        if (($invoice->status == 1) || ($invoice->sent == 1)){return redirect()->action('Client\Admin\InvoiceController@index');}
        $items = $invoice->invoice_items;
        $items_array=[];

        foreach ($items as $t) {
            $items_array[] = $t->id;
        }

        $total = 0;
        for ($i=0;$i < count($request->item);$i++) {
            $amount = $request->quantity[$i] *$request->price[$i];
            $total += $amount;
        }

        $invoice->update([
            'amount' => $total,
            'note' => $request->note,
            'customer_id' => $request->customer,
            'officer_id' => Session::get('client_admin_officer')->id,
            'currency_id' => $request->currency,
            'invoice_due_date' =>$request->invoice_due_date
        ]);

        for ($i=0;$i < count($request->item);$i++) {
            if ($request->type[$i] == 'old') {
                InvoiceItem::find($request->item_ids[$i])->update([
                    'amount' => $request->price[$i],
                    'quantity' =>$request->quantity[$i],
                    'service_id' =>$request->s_ids[$i]
                ]);
            } elseif ($request->type[$i] == 'not_new') {
                InvoiceItem::create([
                    'amount' => $request->price[$i],
                    'quantity' =>$request->quantity[$i],
                    'service_id' =>$request->s_ids[$i],
                    'invoice_id' =>$id
                ]);
            } elseif ($request->type[$i] == 'new') {
                $service = Service::create([
                    'name' => $request->item[$i],
                    'price' => $request->price[$i],
                    'description' => $request->desc[$i],
                ]);
                InvoiceItem::create([
                    'amount' => $request->price[$i],
                    'quantity' =>$request->quantity[$i],
                    'service_id' =>$service->id,
                    'invoice_id' =>$id
                ]);
            }
        }

        foreach ($items_array as $item_id) {
            if (!in_array($item_id, $request->item_ids)) {
                InvoiceItem::where(['id' => $item_id])->delete();
            }
        }

        return redirect()->action('Client\Admin\InvoiceController@index')->with('status', 'Invoice updated successfully!');
    }
    public function send_invoice(Request $request) {
        $invoice_view = Invoice::with('currency')->find($request->id)->toArray();
        $customer = Customer::find($invoice_view['customer_id']);

        $config = Session::get('client.configuration');
        $subdomain = $config->subdomain;
        $client = $config->client->id;

        $emails = [];
        $emails[] = $customer->primary_email;
        if ($customer->secondary_email) {$emails[] = $customer->secondary_email;}

        Mail::send('client.emails.invoice', ['invoice' => $invoice_view, 'subdomain' => $subdomain, 'client' => $client], function ($m) use ($emails) {
            $m->from(env('MAIL_USERNAME','support@ipaychoice.com'),Session::get('client.configuration')->client->name);
            $m->to($emails)->subject(Session::get('client.configuration')->client->name.' sent you an Invoice');
        });

        Invoice::find($request->id)->update(['sent' => 1]);
    }
    public function edit($id) {
        $invoice = Invoice::with('invoice_items.service')->find($id);
        if (($invoice->status == 1) || ($invoice->sent == 1)){return redirect()->action('Client\Admin\InvoiceController@index');}
        $officer = Session::get('client_admin_officer');
        $permissions = Officer::find($officer->id)->permissions;

        $towns_array=[];
        foreach ($permissions as $p) {
            $towns_array[] = $p->town_id;
        }

        $customers = Customer::whereIn('town_id',$towns_array)->get();
        $towns = Town::whereIn('id',$towns_array)->get();
        $services = Service::all();
        $currencies = Currency::all();

        return view('client.admin.edit_invoice',['invoice' => $invoice,'customers' => $customers,'services' => $services,'towns'=>$towns,'currencies'=>$currencies]);
    }
}
