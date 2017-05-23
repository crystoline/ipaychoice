<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    protected $fillable = [
        'domain',
        'database',
        'subscription_start',
        'subscription_end',
        'renewal_period',
        'status',
        'client_id'
    ];

    public function client(){
        $this->belongsTo('App\Models\Client');
    }
}
