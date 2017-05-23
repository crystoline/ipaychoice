<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = [
        'name', 'price'
    ];
}
