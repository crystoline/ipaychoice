<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = ['amount', 'quantity', 'service_id', 'invoice_id'];
    //

    public function invoice() {
        return $this->belongsTo('App\Models\Clients\Invoice');
    }

    public function service() {
        return $this->belongsTo('App\Models\Clients\Service');
    }
}
