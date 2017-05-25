<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class OfficersPermission extends Model
{
    protected $connection = 'mysql_client';
    //
    protected $fillable = ['officer_id','town_id'];

}
