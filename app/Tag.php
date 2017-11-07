<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
     protected $fillable = [
        'name', 'type','status','user_created','user_edited','ip_created','ip_edited',
    ];
}
