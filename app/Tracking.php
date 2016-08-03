<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    //
    protected $fillable = [''];
    protected $dates = ['tracking_at'];

    public function trackable(){
        return $this->morphTo();
    }
}
