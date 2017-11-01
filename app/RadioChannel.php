<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioChannel extends Model
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
        return $this->hasMany('App\RadioUpload'.'radio_channel_id');
    }
}
