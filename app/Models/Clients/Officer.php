<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];
    public function permissions(){
    	return $this->hasMany('App\Models\Clients\OfficersPermission');
    }
}
