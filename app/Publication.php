<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    //
    protected $fillable = [
       'country_id','name','language_id','status','type','frequency','user_created','user_edited','ip_created','ip_edited','b_rate','c_rate','bc1_rate','bc2_rate','c_width','readership',
    ];

    public function language()
    {
        return $this->belongsTo('App\Language');
    }
     public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function sections()
    {
        return $this->hasMany('App\PublicationSection');
        
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
        
    }
}
