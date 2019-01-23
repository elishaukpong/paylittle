<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'timeline',
    ];

    public function getTimelineAttribute($value){
        return $value . " Months";
    }
}
