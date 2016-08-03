<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class CreatePackageRequest extends Request
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
            'name' => 'required',
            'price' => 'numeric',
            'open_image' => 'required_without:old_open_image|image',
            'close_image' => 'required_without:old_close_image|image',
            'weight' => 'required|regex:/^\d*(\.\d{1,})?$/',
            'received_at' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'length' => 'required|integer',
            'width' => 'required|integer',
            'height' => 'required|integer',
        ];
    }
}
