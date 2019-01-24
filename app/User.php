<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


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
       'id', 'first_name', 'last_name', 'email', 'phone', 'verification_string', 'password', 'gender', 'address', 'dob','details', 'occupation'
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

    public function sponsoredProjects()
    {
        return $this->hasMany('App\Models\ProjectSubscription', 'user_id');
    }

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'imageable');
    }
    public function IsAdmin()
    {
        if($this->is_admin != 'admin'){
            return false;
        }
        return true;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
    }

    public function getDobAttribute($value)
    {
        return Carbon::Parse($value)->format('Y-m-d');
    }

    public function getModelAttribute()
    {
        return  "App\User";
    }

}
