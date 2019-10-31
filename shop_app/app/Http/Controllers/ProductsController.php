<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
 
    public function index(){
        $products = Products::all()->distinct()->toArray();
        return view('products', compact('products'));
    }
    private function scale($scale) {
        $products = Products::all()->where('productScale' , $scale)->toArray();
        return view('products', compact('products'));
    }
    public function scale_x(){
        // if($name == "110"){
        // $products = Products::all()->where('productScale' , "1:10");
        return $this->scale('1:10');   
        }  
    }

 

