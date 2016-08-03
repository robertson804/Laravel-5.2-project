<?php

namespace App;

use App\Http\Utilities\ShippingCalculations;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Cashier;

class Order extends Model
{
    //

    protected $fillable = [
        'name', 'slow_price', 'fast_price', 'box_option', 'photo', 'status'
        , 'user_id', 'cost', 'shipping_method', 'charge_id','ordered_at'
        ,'consolidated_at', 'length', 'width', 'height', 'weight'
    ];

    protected $casts = [
        'box_option' => 'boolean'
    ];

    protected $dates = [
        'received_at', 'created_at', 'updated_at', 'ordered_at', 'consolidated_at'
    ];

    public function scopeNotCompleted($query)
    {
        return $query->where('status', '!=', 'complete');
    }

    public function scopeReady($query)
    {
        return $query->where('status', 'ready')
            ->orderBy('shipping_method', 'asc')
            ->orderBy('id', 'asc');
    }

    public function scopeUnshipped($query)
    {
        return $query->whereIn('status', ['pending', 'consolidated']);
    }

    public function scopePaid($query)
    {
        return $query->whereNotIn('status', ['pending', 'consolidated']);
    }

    public function getStatusFormatAttribute(){
        switch($this->original['status']){
            case 'pending':
                return trans('account.pending');
                break;
            case 'consolidated':
                return trans('account.consolidated');
                break;
            case 'ready':
                return trans('account.ready');
                break;
            case 'shipped':
                return trans('account.shipped');
                break;
            case 'arrived':
                return trans('account.arrived');
                break;
            case 'delivered':
                return trans('account.delivered');
                break;
        }
    }

    public function getSlowPriceAttribute($price)
    {
        return Cashier::formatAmount($price);
    }

    public function getFastPriceAttribute($price)
    {
        return Cashier::formatAmount($price);
    }

    public function setSlowPriceAttribute($price)
    {
        $this->attributes['slow_price'] = round($price, 2) * 100;
    }

    public function setFastPriceAttribute($price)
    {
        $this->attributes['fast_price'] = round($price, 2) * 100;
    }

    public function getWeightAttribute()
    {
        if(empty($this->attributes['weight'])) {
            $weight = 0;
            foreach ($this->packages()->get() as $package) {
                $weight += $package->getOriginal('weight');
            }
        } else $weight = $this->attributes['weight'];
        return ShippingCalculations::gramsToPounds($weight);
    }
    public function getPoundsAttribute(){
        return $this->getWeightAttribute();
    }

    public function getShippingMethodAttribute($shipping_method){
        switch($shipping_method){
            case 'box':
                return trans('general.box');
            break;
            case 'slow':
                return trans('general.slow');
                break;
            case 'fast':
                return trans('general.fast');
                break;
        }

        return $shipping_method;

    }

    public function calculateCost($shipping_method)
    {
        switch ($shipping_method) {
            case 'fast' :
                return $this->getOriginal('fast_price');
                break;
            case 'slow' :
                return $this->getOriginal('slow_price');
                break;
            case 'box' :
                //Find the hd box box
                return ShippingBox::find(1)->getOriginal('price');
                break;
        }
    }

    public function getPhotoAttribute()
    {
        if ($this->getOriginal('consolidated_image')) {
            return '/uploads/' . $this->getOriginal('consolidated_image');
        }

        return '/images/package_pending.png';
    }

    public function getCardAttribute()
    {
        if ($this->getOriginal('consolidated_image')) {
            return '/uploads/card/' . $this->getOriginal('consolidated_image');
        }
        return '/images/package_pending.png';
    }

    public function getThumbnailAttribute()
    {
        if ($this->getOriginal('consolidated_image')) {
            return '/uploads/thumbnail/' . $this->getOriginal('consolidated_image');
        }
        return '/images/package_pending.png';
    }

    public function getCostOGAttribute()
    {
        return $this->attributes['cost'];
    }
    public function getCostAttribute($cost)
    {
        if (!$cost) {
            Return 'Unpaid';
        }
        return Cashier::formatAmount($cost);
    }


    public function packages()
    {
        return $this->hasMany('App\Package');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tracking()
    {
        return $this->morphMany('App\Tracking', 'trackable');
    }

    public function shipment()
    {
        return $this->belongsTo('App\Shipment');
    }
}
