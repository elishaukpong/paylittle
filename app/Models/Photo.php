<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'avatar', 'imageable_id','imageable_type'
    ];

    public function imageable(){
        return $this->morphTo();
    }
    public function getAvatarAttribute($value)
    {
        return 'storage/avatars/projects/' . $value;
    }
}
