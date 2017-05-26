<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Officer extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];
    public function permissions(){
    	return $this->hasMany('App\Models\Clients\OfficersPermission');
    }

    public function towns(){
        return $this->hasManyThrough('App\Models\Clients\Town', 'App\Models\Clients\OfficersPermission', 'officer_id', 'id');
    }


}
