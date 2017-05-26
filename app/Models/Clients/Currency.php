<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $connection = 'mysql_client';

    public function invoice() {
        return $this->hasMany('App\Models\Clients\Invoice');
    }
}
