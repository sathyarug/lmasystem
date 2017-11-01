<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvUpload extends Model
{
    //
    protected $fillable = [
        'tv_channel_id','start_time','end_time','user_created','user_edited','ip_created','ip_edited',
    ];

    
}
