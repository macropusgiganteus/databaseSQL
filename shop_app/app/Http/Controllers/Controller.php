<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use App\Orderdetail;
use App\Orders;
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
        $orderNumber = Orders::latest('orderNumber')->first()->orderNumber;
        $orderNumber += 1;
        $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
        return view('addRday')
            ->with(compact('customerNumber'))
            ->with(compact('carts'))
            ->with(compact('orderNumber'));
     }
     public function addOrder(Request $request){
        $orderNumber = Orders::latest('orderNumber')->first()->orderNumber;
        $orderNumber += 1;
        $customerNumber = Cookie::get('ID');
        $rday = $request->get('rday');
        $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
        //---------------------
        $order = new Orders([
            'orderNumber' => $orderNumber,
            'orderDate' => date('Y-m-d'),
            'requiredDate' => $request->get('rday'),
            'customerNumber' => $customerNumber,
        ]);
        $order->timestamps = false;
        $order->save();
        // //---------------------
        // $details = new Orderdetail([
        //     'orderNumber' =>
        //     'productcode' =>
        //     'quantityOrdered' =>
        //     'priceEach' =>
        //     'orderLineNumber'=>
        // ]);
        //---------------------
        $this->validate($request, ['rday' => 'required']);
        return view('addOrder')
            ->with(compact('customerNumber'))
            ->with(compact('carts'))
            ->with(compact('rday'))
            ->with(compact('orderNumber'));
     }
}
