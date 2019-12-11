<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     public function addrequiredDay(){
        $customerNumber = Cookie::get('ID');
        $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
        return view('addRday')
            ->with(compact('customerNumber'))
            ->with(compact('carts'));
     }
     public function addOrder(Request $request){
        $customerNumber = Cookie::get('ID');
        $rday = $request->get('rday');
        $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
        
        $this->validate($request, ['rday' => 'required']);
        return view('addOrder')
            ->with(compact('customerNumber'))
            ->with(compact('carts'))
            ->with(compact('rday'));
     }
}
