<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Exceptions\StripeException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';
    protected $loginPath = '/login';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = ['confirm.required' => trans('general.reg_confirm_required'),
                    'first_name.regex' =>  trans('general.english_only'),
                    'last_name.regex' =>  trans('general.english_only'),
                    'address.regex' =>  trans('general.english_only'),
                    'address_2.regex' =>  trans('general.english_only'),
                    'state.regex' =>  trans('general.english_only'),
                    'city.regex' =>  trans('general.english_only'),
                    'postal.regex' =>  trans('general.english_only')
                  ];
        return Validator::make($data, [
            //login
            'email' => 'required|confirmed|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'company_name' => 'max:255',
            'first_name' => 'required|max:255|regex:/^[a-z A-Z]*$/',
            'last_name' => 'required|max:255|regex:/^[a-zA-Z \']*$/',
            'phone' => 'required|regex:/^\+?[0-9\-]*$/',
            'address' => 'required|max:255|regex:/^[a-zA-Z0-9\.,;\/\\\ \']*$/',
            'address_2' => 'max:255|regex:/^[a-zA-Z0-9\.,;\/\\\ \']*$/',
            'country' => 'required|max:255',
            'state' => 'required|max:255|regex:/^[a-zA-Z \'\-]*$/',
            'city' => 'required|max:255|regex:/^[a-zA-Z \'\-]*$/',
            'postal' => 'max:255|regex:/^[0-9a-zA-Z \',;\-\_\.]*$/',
            'confirm' => 'required',
        ], $messages);

    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {

        //Create the user
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'company_name' => $data['company_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'address_2' => $data['address_2'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'postal' => $data['postal'],
        ]);


        \Mail::send('emails.welcome', ['user' => $user], function ($m) use ($user) {
            $m->from(\Config::get('mail.from.address'), trans('general.site_name'));
            $m->to($user->email, $user->full_name)->subject(trans('emails.welcome_subject'));
        });

        \Mail::send('emails.admin.registration', ['user' => $user], function ($m) use ($user) {
            $m->from(\Config::get('mail.from.address'), trans('general.site_name'));
            $m->to('info@postshipper.com')->subject('Post Shipper | New Account Registered');
        });

        Session::flash('flash_message', Lang::get('account.registrated'));
        return $user;
    }
}
