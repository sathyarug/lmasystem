<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'user_id','name','country_id','user_created','user_edited','ip_created','ip_edited','press','radio','tv'
    ];
    
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
