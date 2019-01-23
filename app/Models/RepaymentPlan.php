<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepaymentPlan extends Model
{
     public $incrementing = false;

    protected $fillable = [
        'id', 'timeline',
    ];

    public function getTimelineAttribute($value){
        return ucwords($value);
    }
}
