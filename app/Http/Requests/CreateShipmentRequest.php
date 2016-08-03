<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateShipmentRequest extends Request
{
    public function messages(){
        return [
            'order.required' => 'You must select at least ONE order.'
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
            'order' => 'array|required',
            'order.*' => 'exists:orders,id',
            'shipping_provider' => 'required|exists:shipping_providers,id',
            'tracking_code' => 'required',
        ];
    }
}
