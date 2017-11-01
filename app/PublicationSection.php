<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationSection extends Model
{
    //
    public function publication()
    {
        return $this->belongsTo('App\Publication');
        
    }
    public function uploads()
    {
        return $this->hasMany('App\PublicationUpload');
        
    }
    
}
