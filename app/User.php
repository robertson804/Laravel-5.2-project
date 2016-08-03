<?php

namespace App;

use App\Postshipper\Shipping\ShippingAddress;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Jedrzej\Pimpable\PimpableTrait;

class User extends Authenticatable
{
    use Billable;
    use PimpableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'company_name', 'first_name','last_name','phone','address','address_2','country','state','city','postal'
    ];

    /**
     * The attributes that are sortable
     */

    protected $sortable = [
       'email' , 'created_at', 'first_name','last_name'
    ];
    protected $searchable = [
        'email' , 'fullName', 'first_name','last_name','phone'
    ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function packages(){
        return $this->hasMany('App\Package');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }

/*
    public function getPhoneAttribute()
    {
        $phoneNumber = preg_replace('/[^0-9]/','',$this->original['phone']);

        if(strlen($phoneNumber) > 10) {
            $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
            $areaCode = substr($phoneNumber, -10, 3);
            $nextThree = substr($phoneNumber, -7, 3);
            $lastFour = substr($phoneNumber, -4, 4);

            $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
        }
        else if(strlen($phoneNumber) == 10) {
            $areaCode = substr($phoneNumber, 0, 3);
            $nextThree = substr($phoneNumber, 3, 3);
            $lastFour = substr($phoneNumber, 6, 4);

            $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
        }
        else if(strlen($phoneNumber) == 7) {
            $nextThree = substr($phoneNumber, 0, 3);
            $lastFour = substr($phoneNumber, 3, 4);

            $phoneNumber = $nextThree.'-'.$lastFour;
        }

        return $phoneNumber;
    }
    */
    public function getShippingAddressAttribute(){
        return ShippingAddress::getShippingAddress($this->id);
    }

    public function getFullNameAttribute(){
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getSubscriptionStatusAttribute(){
        if($this->subscribed('standard')){
            return 'Standard';
        }elseif($this->subscribed('premium')){
            return 'Premium';
        }
        return 'Expired';
    }
}
