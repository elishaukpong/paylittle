<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $sponsorshipAmount = 0;

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
        $sponsorships->each(function($sponsorship){
            $this->sponsorshipAmount += $sponsorship;
        });
        return $this->sponsorshipAmount;
    }


    public function getAvatarAttribute($value){
        return  $value;
    }
    public function getModelAttribute(){
        return  "App\Models\Project";
    }
    public function getFormattedAmountAttribute(){
        return "NGN " . number_format($this->amount);
    }

    public function getShortDetailsAttribute(){
        return substr_replace($this->details, "...",100);
    }


    public function getReturnspercentageAttribute()
    {

        switch($this->duration->timeline){
            case 3:
                return 0.05;
                break;
            case 6:
                return 0.10;
                break;
            case 12:
                return 0.20;
                break;
            default:
                break;
        }
    }
}

