<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = [ 'telephone','user_type','user_id'];

    public function user() {
    	return $this->morphTo();
    }
}
