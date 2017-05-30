<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\Admin\InvoiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Invoice;
use Session;

class ApiController extends Controller
{
    public function get_invoice($invoice_no) {
        $invoice = Invoice::with('customer.town.state','invoice_items.service','currency')->whereInvoiceNo($invoice_no)->first();
        if ($invoice) {
            return response($invoice->toJson());
        } else {
            return response("Invoice does not exist");
        }
    }

    public function update_invoice($invoice_no) {
        $invoice = Invoice::whereInvoiceNo($invoice_no)->first();
        if ($invoice) {
            if ($invoice->status == 1) {
                return response("This invoice has already been set to Paid");
            } else {
                $invoice->update([
                    'status' => 1,
                ]);

                return $invoice;
            }
        } else {
            return "Invoice does not exist";
        }
    }
}
