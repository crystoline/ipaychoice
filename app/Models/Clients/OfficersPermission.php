<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class OfficersPermission extends Model
{
    protected $connection = 'mysql_client';
    //
    protected $fillable = ['officer_id','town_id'];

    public function towns(){
        return $this->hasMany('App\Models\Clients\Town');
    }
}
