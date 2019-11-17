<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\StockIn;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::all()->toArray();
        return view('products', compact('products'));
    }
    private function scale($scale) {
        $products = Products::all()->where('productScale' , $scale)->toArray();
        return view('products', compact('products'));
    }
    public function scale_110(){
       // if($products == '1:10')
            return $this->scale('1:10');
    }
    public function edit($productName){
        $product = Products::find($productName);
        return view('product.edit', compact('product','productName'));
    }

}
