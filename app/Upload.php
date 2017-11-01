<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $fillable = [
        'file','uploadable_id','uploadable_type','user_created','user_edited','ip_created','ip_edited',
    ];
 public function uploadable()
    {
      return $this->morphTo();
    }

    
}
