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

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }
}

