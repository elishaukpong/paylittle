<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paylittler extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'user_id', 'amount', 'duration', 'payback_amount'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');        
    }
}
