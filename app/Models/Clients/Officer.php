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
        'password',
        'type'
    ];
    public function permissions(){
    	return $this->hasMany('App\Models\Clients\OfficersPermission');
    }

    public function towns(){
        return $this->hasManyThrough('App\Models\Clients\Town', 'App\Models\Clients\OfficersPermission', 'id', 'officer_id', 'town_id');
    }

    public function getTownsArrayAttribute(){

        $permissions = $this->permissions;

        $town =  [];
        foreach($permissions as $permissions){
            $town[] = $permissions->town_id;
        }
        //dd($town);
        return $town;
    }


}
