<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use softDeletes;

    public $incrementing = false;

    protected $fillable = [ 'id', 'user_id', 'duration_id', 'repayment_id', 'guarantor_id', 'status_id', 'name', 'amount', 'details', 'location', 'slug' ];

    public function user()
    {
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
    public function repaymentplan()
    {
        return $this->belongsTo('\App\Models\RepaymentPlan', 'repayment_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function subscription()
    {
        return $this->hasMany('App\Models\ProjectSubscription');
    }

    public function hits()
    {
        return $this->hasOne('App\Models\Hits');
    }

    public function guarantor(){
        return $this->belongsTo('App\Models\Guarantor');
    }

    public function getamountSponsoredAttribute()
    {
        $sponsorships = $this->subscription()->get()->pluck('amount')->all();
        return array_sum($sponsorships);
    }

    public function getProjectSponsorshipPercentageAttribute()
    {
        $projectCost                  = $this->amount;
        $projectAmountSponsored       = $this->amountSponsored;
        $projectSponsorshipPercentage = round(($projectAmountSponsored / $projectCost) * 100);
        return $projectSponsorshipPercentage . "%";
    }

    public function getModelAttribute()
    {
        return "App\Models\Project";
    }

    public function getFormattedAmountAttribute()
    {
        return "NGN " . number_format($this->amount);
    }

    public function getFormattedAmountSponsoredAttribute()
    {
        return 'NGN ' . number_format($this->amountSponsored);
    }

    public function getFormattedRepaymentAmountAttribute()
    {
        return 'NGN ' . number_format($this->repayment_amount);
    }

    public function getShortDetailsAttribute()
    {
        return substr_replace($this->details, "...", 100);
    }

    public function getReturnspercentageAttribute()
    {

        switch ($this->duration->timeline)
        {
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
    public function getformattedReturnspercentageAttribute()
    {
        return $this->returnspercentage * 100 . '%';
    }


}

