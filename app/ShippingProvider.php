<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingProvider extends Model
{
    //
    protected $fillable = [
        'name', 'link'
    ];

    public function tracking_link($code){
        return str_replace('{code}', $code ,$this->attributes['link']);
    }
    public function shipments(){
        return $this->hasMany('App\Shipment','shipping_provider');
    }
}
