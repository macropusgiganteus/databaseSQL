<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\StockIn;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::all()->toArray();
        $productScale = Products::select('productScale')->distinct()->get();
        $productVendor = Products::select('productVendor')->distinct()->get();
        return view('products')
            ->with(compact('products'))
            ->with(compact('productScale'))
            ->with(compact('productVendor'));
    }


    public function edit($productName){
        $product = Products::find($productName);
        return view('product.edit', compact('product','productName'));
    }

}


 
