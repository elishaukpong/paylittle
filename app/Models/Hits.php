<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hits extends Model
{
    protected $fillable = ['project_id', 'count'];
}
