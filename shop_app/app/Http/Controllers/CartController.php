<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $customerNumber = Cookie::get('ID');   
        $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
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

        $customerNumber = Cookie::get('ID');
        return view('cart.index')
            ->with(compact('products'))
            ->with(compact('customerNumber'))
            ->with(compact('productScale'))
            ->with(compact('productVendor'))
            ->with(compact('carts'));
    }

    public function search(Request $request)
    {
        $carts = Cart::all()->toArray();
        $customerNumber = Cookie::get('ID');
        $search = $request->get('search');
        $products = Products::where('productName', 'like', '%' . $search . '%')->get();
        $productScale = Products::select('productScale')->distinct()->get();
        $productVendor = Products::select('productVendor')->distinct()->get();
        return view('cart.index')
            ->with(compact('products'))
            ->with(compact('customerNumber'))
            ->with(compact('productScale'))
            ->with(compact('productVendor'))
            ->with(compact('carts'));
    }

    public function create(Request $request)
    {
        $product = Products::where('productCode', $request->get('productCode'))->first();
        $customerNumber = Cookie::get('ID');
        if (Cart::where('productCode', $request->get('productCode'))->exists()) {
            $qtyCart = Cart::select('quantityOrdered')->where('productCode', $request->get('productCode'))->first()->quantityOrdered;
            $qtyCart = $qtyCart + $request->get('qty');
            $Carts = Cart::where('productCode', $request->get('productCode'))->first();
            $Carts->timestamps = false;
            $Carts->update(['quantityOrdered' => $qtyCart]);
        } else {
            $carts = new Cart([
                'productName' => $product['productName'],
                'customerNumber' => $customerNumber,
                'productCode' => $product['productCode'],
                'quantityOrdered' => $request->get('qty'),
                'priceEach' => $product['buyPrice'],
            ]);
            $carts->timestamps = false;
            $carts->save();
        }
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

    public function destroy($carts)
    {
        $cart = carts::where('productCode', $carts);
        $cart->delete();
        return redirect('/cart.index');
    }

    public function show($carts)
    {
        $cart = Cart::where('productCode', $carts);
        $cart->delete();
        return redirect()->route('cart.index');
    }

}
