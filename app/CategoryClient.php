<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryClient extends Model
{
    protected $table = 'category_client';
    
    protected $fillable = [
        'client_id','category_id','company_id','user_created','user_edited','ip_created','status'
    ];
    
     public function categories()
    {
        return $this->hasMany('App\Category','id','category_id');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
