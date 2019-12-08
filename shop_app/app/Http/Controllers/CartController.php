<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use Illuminate\Http\Request;
use Input;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::all()->toArray();
        return view('cart.index', compact('carts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carts = Cart::all()->toArray();
        $products = Products::all()->toArray();
        $productScale = Products::select('productScale')->distinct()->get();
        $productVendor = Products::select('productVendor')->distinct()->get();
        return view('cart.create')
            ->with(compact('products'))
            ->with(compact('productScale'))
            ->with(compact('productVendor'))
            ->with(compact('carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $cart = new Cart([
        //     'customerNumber' => $request->get('103'), 
        //     'productCode' => $request->get($products['productCode']) , 
        //     'quantityOrdered' => $request->get('1'), 
        //     'priceEach' => $request->get($products['buyPrice'])
        // ]);
        // $cart->timestamps = false;
        // $cart->save();

        // return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$productCode)
    {
       
        $product = Products::where('productCode', $productCode)->first();
        $carts = new Cart([
             'customerNumber' => '21', 
             'productCode' => $product['productCode'],
             'quantityOrdered' => '1',
             'priceEach' => $product['buyPrice']
        ]);
         $carts->timestamps = false;
        //  $carts->save();
         dd($carts);

         
        //return redirect()->back();
        //dd($product['productCode']) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        
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
