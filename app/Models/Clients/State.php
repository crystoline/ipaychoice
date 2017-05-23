<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = ['name'];
    //

    public function town() {
    	return $this->hasMany('App\Models\Clients\Town');
    }
}
