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
       'id', 'first_name', 'last_name', 'email', 'phone', 'verification_string', 'password', 'gender', 'address', 'avatar',
    ];

    protected $dates = [
          'dob',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function projectsSponsored()
    {
        return $this->hasMany('App\Models\ProjectSubscription');
    }

    public function IsAdmin()
    {
        if($this->is_admin != 'admin'){
            return false;
        }
        return true;
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
    public function setFirstNameAttribute($value){
        $this->attributes['first_name'] = ucfirst($value);
    }
    public function setLastNameAttribute($value){
        $this->attributes['last_name'] = ucfirst($value);
    }
    
}
