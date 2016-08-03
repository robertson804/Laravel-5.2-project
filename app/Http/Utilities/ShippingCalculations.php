<?php namespace App\Http\Utilities;


class ShippingCalculations {
    const KILO = 0.45359237;
    const ECO_KW = [0=>10,1=>6,10=>1,11=>3,12=>5,13=>5,14=>4,15=>5,19=>4,20=>5,21=>2,22=>3,23=>5,28=>4,32=>1,33=>3,34=>4,43=>5];
    const FAST_KW = [0=>18,1=>6,2=>9,3=>6,4=>5.2,5=>7.8,8=>2.4,9=>4,10=>5,11=>4,12=>5,13=>4,14=>5,15=>4,17=>6,18=>4,21=>3,22=>5,23=>4,25=>3,26=>4,27=>5,28=>3,29=>4,31=>3,32=>4,41=>3,42=>4,43=>5,44=>3,45=>4,48=>3,49=>5,50=>7,51=>5];
    const ECO = [0=>24,1=>2,2=>6,3=>6,4=>3,5=>4,7=>3,8=>6,10=>1,11=>3,12=>5,14=>4
        ,15=>5,19=>4,20=>5,21=>2,22=>3,23=>5,28=>4,32=>1,33=>3,34=>4,43=>5
        ,55=>3.064,56=>3.741,70=>0.839,71=>1.683,72=>3.683];
    const FAST = [0=>31,1=>6,2=>5,3=>6,4=>5,5=>4,7=>5,8=>4,10=>5,11=>4,12=>5
      ,13=>4,14=>5,15=>4,17=>6,18=>4,21=>3,22=>5,23=>4,25=>3,26=>4,27=>5,28=>3
      ,29=>4,31=>3,32=>4,41=>3,42=>4,43=>5,44=>3,45=>4,48=>3,49=>5,50=>3,51=>4
      ,52=>3,53=>4,54=>3,55=>9.08,56=>3.77];

    private static function costAt( $index, $method ) {
        $keys = array_reverse(array_keys($method));

        foreach ($keys as $key) {
            if( $index > $key ) {
                return $method[$key];
            }
        }
    }

    public static function calculateCost($method, $weight, $addressData = []){

        $cost = 0;

        switch ($addressData->sel1) {
          case 'kw':
            $fastMethod = ShippingCalculations::FAST_KW;
            $econMethod = ShippingCalculations::ECO_KW;
            break;

          default:
            $fastMethod = ShippingCalculations::FAST;
            $econMethod = ShippingCalculations::ECO;
            break;
        }

        for($i = 1; $i <= ceil($weight); $i++){
            if($method == 'fast') {
              $cost += ShippingCalculations::costAt($i, $fastMethod);
            } else if($method == 'slow') {
              $cost += ShippingCalculations::costAt($i, $econMethod);
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
