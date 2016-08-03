<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Cashier;
use App\Http\Utilities\ShippingCalculations;

class ShippingBox extends Model
{
    //
    public $fillable = [
        'name',
        'price',
        'max_weight',
        'length',
        'width',
        'height',
    ];

    public function getPriceAttribute($price){

        return Cashier::formatAmount($price);

    }

    public function setMaxWeightAttribute($weight)
    {
        $this->attributes['max_weight'] = ShippingCalculations::poundsToGrams($weight);
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = round($price, 2) * 100;
    }
}
