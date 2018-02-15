<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    protected $fillable = [
       'name','value','publication_id','user_created','ip_created'
    ];
}
