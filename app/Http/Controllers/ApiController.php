<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\Admin\InvoiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Invoice;
use Session;

class ApiController extends Controller
{
    public function get_invoice($invoice_no) {
        $invoice = Invoice::with('customer.town.state','invoice_items.service','currency')->whereInvoiceNo($invoice_no)->first()->toJson();
        return $invoice;
    }

    public function update_invoice($invoice_no) {
        $invoice = Invoice::whereInvoiceNo($invoice_no)->first();
        $invoice->update([
            'status' => 1,
        ]);
        return $invoice;
    }
}
