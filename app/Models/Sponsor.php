<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public $incrementing = false;

    public $fillable = [
        'id', 'user_id', 'sponsor_plan', 'sponsor_duration', 'amount'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Projects');
    }

}

