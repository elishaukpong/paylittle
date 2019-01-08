<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable   
{
    public $incrementing = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'first_name', 'last_name', 'email', 'phone', 'verification_string', 'password', 'gender', 'address',
    ];
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function project()
    {
        return $this->hasMany('App\Models\Project');
    }
    
//    public function sponsor()
//    {
//        return $this->hasOne('App\Models\Sponsor');
//    }
//
//    public function paylittler()
//    {
//        return $this->hasOne('App\Models\Paylittler');
//    }
//    public function admin()
//    {
//        return $this->hasOne('App\Models\Admin');
//    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
    
}
