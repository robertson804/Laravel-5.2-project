<?php
use App\Faq;
use App\Slider;
use \App\User;
use Illuminate\Support\Facades\Config;

/*
 *
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
    Route::get('/home', function () {
        return view('welcome');
    });
    Route::get('/', 'PagesController@welcome');
    Route::get('/how-it-works', function () {
        return view('how-it-works');
    });
    Route::get('/services', function () {
        return view('services');
    });
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/privacy-policy', function (){
        return view('privacy');
    });
    Route::get('/terms-and-conditions', function (){
        return view('terms');
    });
    Route::get('/faq', function (){
        $faqs = Faq::allOrdered();
        return view('faq', compact('faqs'));
    });
    Route::get('/about', function (){
        return view('about');
    });

    Route::get('/calculator', function () {
        $user = Auth::user();
        return view('calculator', compact('user'));
    });

    Route::post('/calculate', 'PagesController@calculate');
    Route::post('/contact','PagesController@sendContactEmail');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web', 'auth'], function () {

    Route::auth();

    Route::get('account/subscribe', 'AccountController@subscribe');
    Route::patch('account/subscribe/{user}', 'UserController@resubscribe');
    Route::get('invoice/{invoice}', 'AccountController@showInvoice');

    Route::get('/email',function(){

        $user = User::find('110');
        $order = $user->orders()->first();

        \Mail::send('emails.welcome',['user'=>$user],function($m){
            $m->from(\Config::get('mail.from.address'), trans('general.site_name')) ;
            $m->to('info@postshipper.com', 'PostshipperAdmin')->subject('PostShipper Admin - Order has been paid for');
        });
        \Mail::send('emails.shipped',compact('user','order'),function($m){
            $m->from(\Config::get('mail.from.address'), trans('general.site_name')) ;
            $m->to('info@postshipper.com', 'PostshipperAdmin')->subject('PostShipper Admin - Order has been paid for');
        });
        \Mail::send('emails.consolidated', compact('user','order'),function($m){
            $m->from(\Config::get('mail.from.address'), trans('general.site_name')) ;
            $m->to('info@postshipper.com', 'PostshipperAdmin')->subject('PostShipper Admin - Order has been paid for');
        });



    } );


    Route::group(['prefix' => 'account', 'middleware' => ['auth', 'user']], function () {
        Route::get('/', 'AccountController@index');
        Route::get('/orders', 'AccountController@orders');
        Route::get('/info', 'AccountController@info');
        Route::get('invoice', 'AccountController@invoice');

        //User editing
        Route::get('edit', 'AccountController@show');
        Route::get('edit/billing', 'AccountController@showBilling');
        Route::get('edit/password', 'AccountController@showPassword');

        Route::patch('update/{user}', 'AccountController@update');
        Route::patch('update/password/{user}', 'AccountController@updatePassword');
        Route::patch('update/billing/{user}', 'AccountController@updateBilling');

        //Handling orders
        Route::post('order/{order}', 'OrderController@pay');
        Route::get('order/{order}', 'OrderController@showAccount');
        Route::get('order/{order}/track', 'OrderController@track');
        Route::delete('order/{order}', 'OrderController@destroy');

        //Handling Packages
        Route::get('{package}/resolve', 'PackageController@resolve');
        Route::patch('package/{package}', 'PackageController@updateResolve');

    });
});

//Admin only!
Route::group(['middleware' => ['web', 'auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('package', 'PackageController');
    Route::get('order/{order}/process', 'OrderController@process');
    Route::patch('order/updateProcess/{order}', 'OrderController@updateProcess');
    Route::get('order/unprocessed', 'OrderController@viewUnprocessed');
    Route::resource('order', 'OrderController');


    Route::get('user/{user}/edit', 'UserController@edit');
    Route::get('user/{user}/edit/billing', 'UserController@editBilling');
    Route::get('user/{user}/edit/password', 'UserController@editPassword');

    Route::patch('user/update/{user}', 'AccountController@update');
    Route::patch('user/update/password/{user}', 'AccountController@updatePassword');
    Route::patch('user/update/billing/{user}', 'AccountController@updateBilling');

    Route::resource('user', 'UserController');

    Route::get('shipment/{shipment}/track', 'ShipmentController@track');
    Route::post('shipment/{shipment}/complete', 'ShipmentController@complete');
    Route::post('shipment/{shipment}/uncomplete', 'ShipmentController@uncomplete');

    Route::resource('shipment', 'ShipmentController');
    Route::resource('slider', 'SliderController');
    Route::resource('faq', 'FaqController');
    Route::post('faq/{faq}/up', 'FaqController@moveUp');
    Route::post('faq/{faq}/down', 'FaqController@moveDown');

    Route::resource('provider', 'ShippingProviderController');

    Route::resource('tracking', 'TrackingController');

    Route::resource('shipping-box', 'ShippingBoxController');
});

