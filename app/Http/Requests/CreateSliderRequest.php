<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSliderRequest extends Request
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
            'link' => '',
            'image' => 'required_without:old_slide|image|image_size:1360,461',
        ];
    }
}
