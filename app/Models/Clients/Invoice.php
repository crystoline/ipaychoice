<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = [
        'invoice_no',
        'amount',
        'status',
        'customer_id',
        'note',
        'officer_id',
        'currency_id'
    ];
    public function customer(){
        return $this->belongsTo('App\Models\Clients\Customer');
    }
    public function officer(){
        return $this->belongsTo('App\Models\Clients\Officer');
    }
    public function invoice_items() {
        return $this->hasMany('App\Models\Clients\InvoiceItem');
    }
}
