<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    } 

    public function client()
    {
        return $this->hasOne('App\Client');
    }
    public function contact()
    {
        return $this->hasOne('App\Client');
    }
    public function publications()
    {
        return $this->belongsToMany('App\Publication')->withPivot('upload_status','tag_status')->withTimestamps();
    }
    public function uploader()
    {
        return $this->belongsToMany('App\Publication')->wherePivot('upload_status','=','1')->withTimestamps();
    }
}
