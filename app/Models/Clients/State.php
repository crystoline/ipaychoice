<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = ['name'];
    //

    public function towns() {
    	return $this->hasMany('App\Models\Clients\Town');
    }

    public function officers(){
        return $this->hasManyThrough('App\Models\Clients\Officer','App\Models\Clients\OfficersPermission', 'officer_id', 'id');
    }
    public function customers(){
        return $this->hasManyThrough('App\Models\Clients\Customer','App\Models\Clients\Town', 'id', 'town_id');
    }
}
