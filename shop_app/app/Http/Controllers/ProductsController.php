<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

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
    public function scale(Request $request){
        $products = Products::all()->where('productScale' , $request)->toArray();
        return view('products', compact('products'));
    }
    }

 

