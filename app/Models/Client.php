<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = ['name','address','user_id','preference'];

    public  function configuration()
    {
       return $this->hasOne('App\Models\Configuration');
    }
}

