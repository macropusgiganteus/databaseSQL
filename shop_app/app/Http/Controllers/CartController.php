<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $carts = Cart::all()->toArray();
        if (empty($request->input('scale')) && empty($request->input('vendor'))) {
            $products = Products::all()->toArray();
        } elseif (!empty($request->input('scale')) && empty($request->input('vendor'))) {
            $products = Products::all()
                ->where('productScale', $request->input('scale'))->toArray();
        } elseif (empty($request->input('scale')) && !empty($request->input('vendor'))) {
            $products = Products::all()
                ->where('productVendor', $request->input('vendor'))->toArray();
        } else {
            $products = Products::all()
                ->where('productScale', $request->input('scale'))
                ->where('productVendor', $request->input('vendor'))->toArray();
        }
        $productScale = Products::select('productScale')->distinct()->get();
        $productVendor = Products::select('productVendor')->distinct()->get();

        return view('cart.create')
            ->with(compact('products'))
            ->with(compact('productScale'))
            ->with(compact('productVendor'))
            ->with(compact('carts'));

    }

    public function create(Request $request)
    {
        $product = Products::where('productCode', $request->get('productCode'))->first();
        $carts = new Cart([
            'customerNumber' => '21',
            'productCode' => $product['productCode'],
            'quantityOrdered' => $request->get('qty'),
            'priceEach' => $product['buyPrice'],
        ]);
        $carts->save();

        return redirect()->route('cart.index');
    }

    public function store()
    {

    }

    public function edit($productCode)
    {

    }

    public function update(Request $request, $product)
    {

    }

    public function destroy($id)
    {
        //
    }

}
