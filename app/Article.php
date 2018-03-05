<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
 
      public function photo()
    {
    return $this->morphMany('App\Upload', 'uploadable');
    }
}
