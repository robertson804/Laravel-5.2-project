<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'name', 'link', 'slider',
    ];


    public function getSliderAttribute(){
        return '/uploads/slides/' . $this->getOriginal('slider');
    }
}
