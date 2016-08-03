<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Utilities\ShippingCalculations;

class PagesController extends Controller
{
    public function calculate(Request $request){

        //Convert weight to grams

        $fastCost = ShippingCalculations::calculateCost( 'fast', $request->weight,$request);
        $slowCost = ShippingCalculations::calculateCost( 'slow', $request->weight,$request);

        if($request->ajax())
        {
            return response()->json([
                'responseText' => 'Success!',
                'fast' => $fastCost,
                'slow' => $slowCost
            ], 200);
        }
    }

    public function sendContactEmail(Requests\ContactFormRequest $request){

        \Mail::send('emails.admin.contact',['request'=>$request],function($m){
            $m->from( \Config::get('mail.from.address'), trans('general.site_name')) ;
            $m->to('info@postshipper.com', 'PostshipperAdmin')->subject('PostShipper Admin - Contact Us Message');
        });
        \Session::flash('flash_message', trans('general.contact_flash'));
        return redirect()->back();

    }

    public function welcome(){
        $sliders = Slider::all();
        return view('welcome',compact('sliders'));
    }

}
