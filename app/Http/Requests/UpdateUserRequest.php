<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Illuminate\Support\Facades\Gate;

class UpdateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->route('user');
        return Gate::allows('update-user', User::findOrFail($user->id));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|phone:LENIENT,US,KW,SA',
            'address' => 'required|max:255',
            'address_2' => 'max:255',
            'country' => 'required|max:255',
            'state' => 'required|max:255',
            'city' => 'required|max:255',
            'postal' => 'max:255',
        ];
    }
}
