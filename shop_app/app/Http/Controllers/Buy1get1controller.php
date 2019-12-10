<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buy1Get1;
use App\Products;

class Buy1get1controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Buy1Get1::all()->toArray();
        return view('buy1get1.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buy1get1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 'productCode' => 'required', 'exp' => 'required' ]);
        if(Products::where('productCode',$request->get('productCode'))->exists()){
            $product = new Buy1Get1([
                'ProductCode' => $request->get('productCode'),
                'EXP_Date' => $request->get('exp')
            ]);
            $product->timestamps = false;
            // $product->save();
            return redirect()->route('buy1get1.create')->with('success','New products have been added on this promotion.');
        }else{
            return redirect()->route('buy1get1.create')->with('errors');
        }
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
        //
    }
}
