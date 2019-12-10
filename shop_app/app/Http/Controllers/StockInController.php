<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockIn;
use App\Products;
class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $stock = StockIn::all()->toArray();
        return view('stock.index', compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('stock.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [ 'productID' => 'required', 'amount' => 'required' ]);
        if(Products::where('productCode',$request->get('productID'))->exists()){
            $stock = new StockIn([
            'productID' => $request->get('productID'),
            'amount' => $request->get('amount')] );
            $stock->save();
        $qualityProduct = Products::select('quantityInStock')->where('productCode',$request->get('productID'))->first()->quantityInStock; 
        $qualityProduct = $qualityProduct+$request->get('amount');

        $products = Products::where('productCode',$request->get('productID'))->first();
        $products->timestamps = false;
        $products-> update(['quantityInStock' => $qualityProduct]);
        return redirect()->route('stock.index')->with('success','New products have been added.');
        }
        else{
            return redirect()->route('stock.index')->with('errors','Do not have this ProductID');
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
        // $stock = StockIn::find($id);
        // return view('stock.edit', compact('stock','id'));
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
        // $this->validate($request,['amount' => 'required']);
        // $stock = StockIn::find($id);
        // $stock->amount = $request->get('amount');
        // $stock->save();
        // return redirect()->route('stock.index')->with('success','data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = StockIn::find($id);
        $qualityProduct = Products::select('quantityInStock')->where('productCode',$stock['productID'])->first()->quantityInStock;
        $qualityProduct = $qualityProduct-$stock['amount'];
        $products = Products::where('productCode',$stock['productID'])->first();
        $products->timestamps = false;
        $products-> update(['quantityInStock' => $qualityProduct]);
        $stock->delete();
        return redirect()->route('stock.index')->with('success','This products have been deleted!');
    }

   
}
