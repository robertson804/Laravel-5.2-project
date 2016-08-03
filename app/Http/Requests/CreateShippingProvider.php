<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateShippingProvider extends Request
{

    public function messages()
    {
        return [
            'link.regex' => 'Provider link must be a valid url containing {code} '
        ];
    }

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
            'name' => 'required',
            'link' => 'required|regex:/\{code\}/'
        ];

    }
}
