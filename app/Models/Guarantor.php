<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    protected $fillable = [
        'name', 'email', 'user_id'
    ];

    public function projects(){
        return $this->hasMany('App\Models\Project');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

     public function getInitialAttribute(){
        return substr($this->name, 0, 1);
    }
}
