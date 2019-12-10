<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;

class Discountcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $promotion = Discount::all()->toArray();
        return view('discount.index',compact('promotion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 'promotionId' => 'required','count' => 'required' ,'exp' => 'required' ]);
        $promotion = new Discount([
            'PromotionCode' => $request->get('promotionId'),
            'Count' => $request->get('count'),
            'EXP_Date' => $request->get('exp')
        ]);
        $promotion->save();
        return redirect()->route('discount.create')->with('success','New discount code has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Discount::find($id);
        $promotion->delete();
        return redirect()->route('discount.index')->with('success', 'This promotion has been deleted.');
    }
}
