<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $connection = 'mysql_client';
    protected $fillable = ['name', 'state_id'];


    public function state(){
        return $this->belongsTo('App\Models\Clients\State');
    }
}
