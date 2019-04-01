<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bvn extends Model
{
    protected $fillable = ['number', 'status_id', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }

}
