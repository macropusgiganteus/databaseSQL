<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    // $scale = Product::groupBy('productScale')->toArray();
    public function index(){
        $products = Products::all()->groupBy('productScale')->toArray();
        $products1 = Products::all()->groupBy('productVendor')->toArray();
        return view('products')
            ->with(compact('products'))
            ->with(compact('products1'));
    }

    public function scale($key) {
        $products = Products::all()->where('productScale' , $key)->toArray();
        return view('products', compact('products'));
    }
    // public function scale_x(){
    //     // if($name == "110"){
    //     // $products = Products::all()->where('productScale' , "1:10");
    //     return $this->scale('1:12');   
    //     }  
    }

 

