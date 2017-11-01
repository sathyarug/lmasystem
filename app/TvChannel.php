<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvChannel extends Model
{
    //
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
     public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function uploads()
    {
        return $this->hasMany('App\TvChannel','tv_channel_id');
    }

}
