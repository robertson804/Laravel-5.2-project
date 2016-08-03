<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTrackingRequest extends Request
{

    public function messages()
    {
        return [
            'tracking_at.before' => 'Tracking Date cannot be in the future more than a week',
            'tracking_at.after' => "Tracking Date cannot be before the last 'All' tracking instance"
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
            'tracking_at' => 'required|date|before:+1 week|after:last_tracking_date',
            'location' => 'required|string',
            'description' => 'required|string',
        ];
    }
}
