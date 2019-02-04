<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'user_id', 'duration_id', 'repayment_id', 'status_id','name','amount','details', 'address','location'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'imageable');
    }

    public function duration()
    {
        return $this->belongsTo('\App\Models\Duration');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }

    public function subscription()
    {
        return $this->hasMany('App\Models\ProjectSubscription');
    }

    public function getamountSponsoredAttribute()
    {
        $sponsorships = $this->subscription()->get()->pluck('amount');
        $sponsorshipAmount = 0;
        foreach( $sponsorships as $sponsorship){
            $sponsorshipAmount += $sponsorship;
        }
        return $sponsorshipAmount;
    }


    public function getAvatarAttribute($value){
        return  $value;
    }
    public function getModelAttribute(){
        return  "App\Models\Project";
    }
    public function getAmountAttribute($value){
        return "N " . number_format($value);
    }

    public function getShortDetailsAttribute(){
        return substr_replace($this->details, "...",100);
    }


    public function getReturnspercentageAttribute()
    {

        switch($this->duration->timeline){
            case 3:
                return 0.075;
                break;
            case 6:
                return 0.15;
                break;
            case 12:
                return 0.30;
                break;
            default:
                break;
        }
    }
}

