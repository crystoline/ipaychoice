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
            return response()->json([
                'status' => true,
                'status_code' => 200,
                'status_message' => 'Successful',
                'data' => $invoice
            ]);
        } else {
            return response()->json([
                'status' => false,
                'status_code' => 400,
                'status_message' => 'Invoice does not exist',
                'data' => null
            ]);
        }
    }

    public function update_invoice(Request $request, $invoice_no) {
      //  file_put_contents('apiresponse.txt',print_r($request->all(),true));
        if (!$request->data['amount']) {
            return response()->json([
                'status' => false,
                'status_code' => 100,
                'status_message' => 'Invoice amount required',
                'data' => null
            ]);
        }

        $invoice = Invoice::whereInvoiceNo($invoice_no)->first();

        if ($invoice) {
            if ($invoice->amount != $request->data['amount']) {
                return response()->json([
                    'status' => false,
                    'status_code' => 100,
                    'status_message' => 'The amount is incorrect!',
                    'data' => null
                ]);
            }
            if ($invoice->status == 1) {
                return response()->json([
                    'status' => false,
                    'status_code' => 300,
                    'status_message' => 'This invoice has already been set to Paid',
                    'data' => null
                ]);
            } else {
                $invoice->update([
                    'status' => 1,
                ]);

                return response()->json([
                    'status' => true,
                    'status_code' => 200,
                    'status_message' => 'Successful',
                    'data' => $invoice
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'status_code' => 400,
                'status_message' => 'Invoice does not exist',
                'data' => null
            ]);
        }
    }
}
