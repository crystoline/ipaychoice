<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = [ 'email','user_type','user_id'];

    public function user() {
    	return $this->morphTo();
    }
}
