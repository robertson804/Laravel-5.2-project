<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Http\Utilities\ImageHandler;

class SliderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateSliderRequest $request)
    {
        //Save the slider
        $slider = new Slider();
        $slider->name = $request->name;
        $slider->link = $request->link;
        $filename = str_slug($request->name, '-') . '.' . $request->image->getClientOriginalExtension();
        $slider->slider = $filename;

        //Save the image somewhere
        ImageHandler::storeSlide($request->image, $filename);

        $slider->save();

        //Return the response
        \Session::flash('flash_message', 'Slider Provider Created');
        return redirect()->action('SliderController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateSliderRequest $request, Slider $slider)
    {
        $slider->name = $request->name;
        $slider->link = $request->link;

        if ($request->image) {
            $filename = str_slug($request->name, '-') . '.' . $request->image->getClientOriginalExtension();
            $slider->slider = $filename;

            //Save the image somewhere
            ImageHandler::storeSlide($request->image, $filename);
        }

        $slider->save();
        \Session::flash('flash_message', 'Slider Updated');
        return redirect()->action('SliderController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        \Session::flash('flash_message', 'Slide Deleted');
        return redirect()->action('SliderController@index');
    }
}
