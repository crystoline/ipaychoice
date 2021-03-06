<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $connection = 'mysql_client';

    protected $fillable = [
        'name',
        'primary_email',
        'primary_phone',
        'town_id',
        'primary_contact_name',
        'secondary_contact_name'
    ];

    public function telephone() {
    	return $this->morphMany('App\Models\Clients\Telephone','user');
    }
    public function email()
    {
        return $this->morphMany('App\Models\Clients\Email', 'user');
    }

    public function town(){
        return $this->belongsTo('App\Models\Clients\Town');

    }
}

