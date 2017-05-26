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

    public function customers(){
        return $this->hasMany('App\Models\Clients\Customer');
    }

   /* public function officers(){
        return $this->hasMany('App\Models\Clients\Officer');
    }*/
    public function officers()
    {
        return $this->hasManyThrough('App\Models\Clients\Officer','App\Models\Clients\OfficersPermission', 'town_id', 'id');
    }
}
