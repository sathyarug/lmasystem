<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'category_status', 'sub_category_status','user_created','user_edited','ip_created','ip_edited',
    ];
    //
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
    public function companies()
    {
        return $this->hasMany('App\Company');
    }
    public function subCategories()
    {
        return $this->hasMany('App\SubCategory');
    }
}
