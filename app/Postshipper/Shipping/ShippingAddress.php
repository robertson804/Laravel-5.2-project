<?php namespace App\Postshipper\Shipping;


class ShippingAddress {

    const company = 'PostShipper';
    const street_no = '601';
    const street = 'Carson DR';
    const unit = '#';
    const city = 'Bear';
    const state = 'DE';
    const country = 'US';
    const zip = '19701';
    const phone = '+1-302-444-8144';

    public static function getShippingAddress($user_id){
        return [
            'company' => self::company,
            'street_no' => self::street_no,
            'street' => self::street,
            'unit' => self::unit . $user_id,
            'city' => self::city,
            'state' => self::state,
            'country' => self::country,
            'zip' => self::zip,
            'phone' => self::phone,
            'full' => self::street_no . ' ' . self::street . ', ' .
                self::unit . $user_id.  ', ' . self::city . ' ' . self::state . ' '
                . self::country . ', ' . self::zip
        ];
    }
}
