<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
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
