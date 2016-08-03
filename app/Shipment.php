<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shipment extends Model
{

    protected $fillable = ['shipping_provider','tracking_code','complete'];

    protected $casts = [
        'complete' => 'boolean',
    ];


    public function packages(){
        return $this->hasManyThrough('App\Package','App\Order');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function scopeUncompleted($query){
        return $query->where('complete', false);
    }

    public function getStatusAttribute(){
        if($this->complete === false) {
            return 'Pending';
        }

        return 'Complete';
    }

    public function shippingProvider(){
        return $this->belongsTo('App\ShippingProvider','shipping_provider');
    }

    public function tracking(){
        return $this->morphMany('App\Tracking','trackable');
    }

    public function trackingThrough(){
        //$shipment_tracking = $this->tracking();

        $tracking = DB::table('trackings')
            ->whereIn('trackable_id',$this->orders()->pluck('id'))->where('trackable_type','App\Order')
            ->orWhere(function($query){
                $query
                    ->where('trackable_type','App\Shipment')
                    ->where('trackable_id',$this->id);
            })
            ->orderBy('tracking_at','asc')
            ->orderBy('created_at','asc')
            ->orderBy('trackable_type','desc')
        ;

        return $tracking;
    }
}
