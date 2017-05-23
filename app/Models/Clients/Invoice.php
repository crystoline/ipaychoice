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
        'customer_id'
    ];
    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }
    public function officer(){
        return $this->belongsTo('App\Models\Officer');
    }
}
