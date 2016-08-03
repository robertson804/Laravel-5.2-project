<?php namespace App\Http\Utilities;


class ShippingCalculations {
    const KILO = 0.45359237;

    public static function calculateCost($method, $weight, $addressData = []){

        $cost = 0;
        switch($method){
            case "fast":
                $usd = 13; //
                $usd2 = 6;
                break;
            case "slow":
                $usd = 10;
                $usd2 = 6;
                break;
        }

        for($i = 0; $i < round($weight); $i++){
            if($i < 1){
               $cost += $usd;
            }
            else{
                $cost += $usd2;
            }
        }

        return number_format($cost,2);
    }

    public static function gramsToPounds($grams){
        return round(($grams / 1000) / self::KILO, 2);
    }
    public static function kilosToGrams($kilos){
        return round($kilos * 1000);

    }
    public static function poundsToGrams($pounds){
        return round($pounds * self::KILO * 1000,2);

    }

    public static function getTrackingLink($provider, $tracking_code){
        switch($provider){
            case'DHL':
                return "http://www.dhl.com/content/g0/en/express/tracking.shtml?brand=DHL&AWB=$tracking_code&commit=Track!";
                break;
            case'UPS':
                return "http://wwwapps.ups.com/etracking/tracking.cgi?TypeOfInquiryNumber=T&InquiryNumber1=$tracking_code&commit=Track!";
                break;
            case'FEDEX':
                return "https://www.fedex.com/apps/fedextrack/?tracknumbers=$tracking_code&commit=Track!";
                break;
        }
    }
}