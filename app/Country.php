<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function companies()
    {
        return $this->hasMany('App\Company');
    }
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact');

    }
     public function publications()
    {
        return $this->hasMany('App\Publication');
        
    }
    public function radioChannels()
    {
        return $this->hasMany('App\RadioChannel');
        
    }
    public function tvChannels()
    {
        return $this->hasMany('App\TvChannel');
        
    }
}
