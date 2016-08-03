<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class ConsolidateOrderRequest extends Request
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
            'slow_price' => 'required|numeric',
            'fast_price' => 'required|numeric',
            'consolidated_image' => 'required|image'
        ];
    }
}
