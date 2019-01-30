<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectSubscription extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'user_id', 'project_id', 'status_id', 'amount', 'returns',
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }

    public function getAmountAttribute($value){
        return $value;
    }
    public function getFormattedAmountAttribute(){
        return "N " . number_format($this->amount);
    }
    public function getReturnsAttribute($value){
         return "N " . number_format($value);
    }
    public function getFormattedReturnsAttribute(){
        return "N " . number_format($this->returns);
    }
}
