<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable implements MustVerifyEmail
{
    public $incrementing = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'first_name', 'last_name', 'email', 'phone', 'gender', 'dob', 'address', 'is_admin', 'organization_id', 'password', 'details', 'occupation', 'city', 'state_id', 'localgovernmentarea_id', 'slug',];

    protected $dates = ['dob'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token', ];

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'imageable');
    }

    public function bvn()
    {
        return $this->hasOne('App\Models\bvn');
    }

    public function sponsoredProjects()
    {
        return $this->hasMany('App\Models\ProjectSubscription', 'user_id');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function guarantors()
    {
        return $this->hasMany('App\Models\Guarantor');
    }



    public function setPasswordAttribute( $value )
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setFirstNameAttribute( $value )
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setLastNameAttribute( $value )
    {
        $this->attributes['last_name'] = ucfirst($value);
    }

    public function getDobAttribute( $value )
    {
        return Carbon::Parse($value)->toFormattedDateString();
    }

    public function getdefaultAvatarAttribute()
    {
        return 'https://placeimg.com/400/400/any';
    }

    public function getGenderAttribute( $value )
    {
        return ucwords($value);
    }

    public function getModelAttribute()
    {
        return "App\User";
    }

    public function getTotalCountAttribute()
    {
        return $this->sponsoredProjects()->count() + $this->projects()->count();
    }

    public function getFullnameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


}
