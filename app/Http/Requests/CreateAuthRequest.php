<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAuthRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',

            'company_name' => 'max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|phone:LENIENT,US,KW,SA,CA',

            'address' => 'required|max:255',
            'address_2' => 'max:255',
            'country' => 'required|max:255',
            'state' => 'required|max:255',
            'city' => 'required|max:255',
            'postal' => 'required|max:255',
        ];
    }
}
