<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = ['name','address','user_id','preference'];
    protected $casts = [
        'options' => 'json'
    ];

    public  function configuration()
    {
       return $this->hasOne('App\Models\Configuration');
    }

    public function getLogoSrcAttribute(){
        if(!empty($this->options['logo']))
            return asset(str_replace('public', 'storage', $this->options['logo']));
        else return '';
    }
}

