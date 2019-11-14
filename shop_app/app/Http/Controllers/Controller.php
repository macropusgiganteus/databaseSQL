<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    // FUCNTION TO GET ORDER DATA FROM DATABASE
    function getData(){
        $data['data'] = DB::table('orders')->get();
        if(count($data)>0){
            return view('order',$data);
        }else{
            return view('order');
        }
    }

   
    function getProducts(){
        
       $products['products'] = DB::table('products')->get();
        if(count($products)>0){
            return view('products',$products);
        }else{
            return view('products');
        }
    }

}
