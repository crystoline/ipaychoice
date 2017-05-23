<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = ['amount', 'quantity', 'service_id', 'invoice_id'];
    //
}
