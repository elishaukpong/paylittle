<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    protected $fillable = [
        'name', 'email'
    ];

    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
}
