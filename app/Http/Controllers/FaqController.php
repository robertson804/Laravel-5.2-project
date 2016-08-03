<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Http\Requests\CreateFaqRequest;
use DB;


/**
 * Class FaqController
 * @package App\Http\Controllers
 */
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::allOrdered();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFaqRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFaqRequest $request)
    {
        //Save the faq
        $faq = Faq::create($request->input());
        $faq->order = Faq::all()->count();
        $faq->save();

        //Return the response
        \Session::flash('flash_message', 'Faq Provider Created');
        return redirect()->action('FaqController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('admin.faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateFaqRequest $request
     * @param Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->input());
        $faq->save();

        \Session::flash('flash_message', 'Faq Updated');
        return redirect()->action('FaqController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        DB::table('faqs')->where('order', '>', $faq->order)->decrement('order');

        \Session::flash('flash_message', 'Faq Deleted');
        return redirect()->action('FaqController@index');
    }

    /**
     * Shift the items order up one.
     *
     * @param Faq $faq
     */
    public function moveUp(Faq $faq)
    {
        $currentOrder = $faq->order;
        $newOrder = $currentOrder - 1;

        if ($currentOrder == 1) {
            \Session::flash('flash_message', 'Items already at the top');
            return redirect()->back();
        }
        $replaceFaq = Faq::where('order', $newOrder)->get()[0];
        $replaceFaq->increment('order');

        $faq->decrement('order');

        \Session::flash('flash_message', 'Moved ' . $faq->name . ' up a spot');
        return redirect()->back();
    }

    /**
     * Shift the items order up one.
     *
     * @param Faq $faq
     */
    public function moveDown(Faq $faq)
    {
        $currentOrder = $faq->order;
        $newOrder = $currentOrder + 1;
        if ($currentOrder == Faq::all()->count()) {
            \Session::flash('flash_message', 'Items already at the bottom');
            return redirect()->back();
        }
        $replaceFaq = Faq::where('order', $newOrder)->get()[0];

        $faq->increment('order');

        $replaceFaq->decrement('order');

        \Session::flash('flash_message', 'Moved ' . $faq->name . ' down a spot');
        return redirect()->back();
    }
}
