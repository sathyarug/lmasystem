<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientEmail extends Model
{
    protected $fillable = [
       'client_id','email','user_created','ip_created','press','radio','tv','status'
    ];
}
