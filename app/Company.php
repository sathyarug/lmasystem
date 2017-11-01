<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
     protected $fillable = [
        'country_id','name_short','name_full','logo','category_id','user_created','user_edited','ip_created','ip_edited',
    ];
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    // public function photo()
    // {
    //     return $this->belongsTo('App\Upload','logo');
    // }
    public function photo()
    {
    return $this->morphMany('App\Upload', 'uploadable');
    }
}
