<?php


namespace App\Http\Utilities;

use Monarobase\CountryList\CountryList;

class Countries extends CountryList
{

    public static function getSome(Array $countryCodes, $locale = 'en', $source = 'cldr')
    {
        $countrys = [];
        $cty = new CountryList();
        foreach ($countryCodes as $countryCode) {
            $countrys[$countryCode] = $cty->getOne($countryCode,$locale,$source);
        }
        return $countrys;
    }


}