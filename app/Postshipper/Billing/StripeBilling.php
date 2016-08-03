<?php namespace App\Postshipper\Billing;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Refund;
use Stripe\Stripe;
use Stripe\Error;

class StripeBilling
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public  function getCharge($charge_id)
    {
        return Charge::retrieve($charge_id);
    }
    public  function getCharges($customer)
    {
        $charges = Charge::all(['customer'=>$customer]);
        $charges = $charges->data;
        return $charges;
    }

    public function updateCard($customer, $token){
        $cu = Customer::retrieve($customer);
        $cu->source = $token; // obtained with Stripe.js
        $cu->save();
        return true;
    }

    public function refundCharge($charge_id){
        Refund::create(['charge'=> $charge_id]);
    }

    public function Charge(){

    }
}