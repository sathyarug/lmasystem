<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function categories()
    {
        return $this->hasMany('App\Category');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
