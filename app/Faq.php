<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'name','title_en','title_ar', 'content_en', 'content_ar','order'
    ];

    public function scopeAllOrdered($query){
        return $query->orderBy('order','asc')->get();
    }
}
