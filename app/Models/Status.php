<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    public function getNameAttribute($value){
        return ucwords($value);
    }
}
