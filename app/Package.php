<?php

namespace App;

use App\Http\Utilities\ShippingCalculations;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Image;
use Laravel\Cashier\Cashier;

class Package extends Model
{
    protected $fillable = [
        'name', 'price', 'open_image', 'close_image', 'user_id', 'received_at', 'weight', 'length', 'height', 'width'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     *
     */
    protected $dates = ['created_at', 'updated_at', 'received_at'];

    public function setReceivedDateAttribute($date)
    {
        $this->attributes['received_at'] = Carbon::parse($date);
    }

    public function scopeUnready($query)
    {
        return $query->whereIn('status', ['resolve', 'pending'])->orderBy('received_at', 'desc');
    }

    public function getDimensionsAttribute()
    {
        return $this->length . '" x ' . $this->width . '" x ' . $this->height . '"';
    }

    public function getOverSizedAttribute()
    {
        //If any measurement is > 20
        if ($this->length > 20 || $this->height > 20 || $this->width > 20) {
            return true;
        }
        //If any two measurements are greater than 16
        if (
            $this->length + $this->height > 32 ||
            $this->width + $this->height > 32 ||
            $this->length + $this->width > 32
        ) {
            return true;
        }
        return false;
    }

    public function getOpenImageAttribute($open_image)
    {
        if ($this->getOriginal('open_image')) {
            return '/uploads/' . $open_image;
        }
        return '/images/icons/deliver.svg';
    }

    public function getOpenCardAttribute()
    {
        if ($this->getOriginal('open_image')) {
            return '/uploads/card/' . $this->getOriginal('open_image');
        }
        return '/images/icons/deliver.svg';
    }

    public function getOpenThumbnailAttribute()
    {
        if ($this->getOriginal('open_image')) {
            return '/uploads/thumbnail/' . $this->getOriginal('open_image');
        }
        return '/images/icons/deliver.svg';
    }

    public function getCloseImageAttribute($photo)
    {
        if ($this->getOriginal('close_image')) {
            return '/uploads/' . $photo;
        }
        return '/images/icons/deliver.svg';
    }

    public function getCloseCardAttribute()
    {
        if ($this->getOriginal('close_image')) {
            return '/uploads/card/' . $this->getOriginal('close_image');
        }
        return '/images/icons/deliver.svg';
    }

    public function getCloseThumbnailAttribute()
    {
        if ($this->getOriginal('close_image')) {
            return '/uploads/thumbnail/' . $this->getOriginal('close_image');
        }
        return '/images/icons/deliver.svg';
    }


    public function getReceivedDateAttribute($date)
    {
        return $date;
    }

    public function getPriceOgAttribute()
    {
        return $this->attributes['price'];
    }

    public function getPriceAttribute($price)
    {
        return Cashier::formatAmount($price);
    }


    public function getWeightOgAttribute()
    {
        return $this->attributes['weight'];
    }

    public function getWeightAttribute($weight)
    {
        return ShippingCalculations::gramsToPounds($weight) . ' LB';
    }

    public function setWeightAttribute($weight)
    {
        $this->attributes['weight'] = ShippingCalculations::poundsToGrams($weight);
    }

    public function getDaysLeftAttribute()
    {
        $left = 45 - Carbon::parse($this->attributes['received_at'])->diffInDays();
        if ($left <= 0) {
            return false;
        }
        return $left;
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = ceil($price * 100);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
