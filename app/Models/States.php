<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $fillable = ['name'];


    public function lga(  )
    {
        return $this->hasMany('App\Models\LocalGovernmentArea');
    }
}
