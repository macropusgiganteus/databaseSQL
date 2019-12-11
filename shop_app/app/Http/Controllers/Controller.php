<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use App\Orderdetail;
use App\Orders;
use App\Discount;
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
        $discount = 0;
        $customerNumber = Cookie::get('ID');
        $orderNumber = Orders::latest('orderNumber')->first()->orderNumber;
        $orderNumber += 1;
        $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
        return view('addRday')
            ->with(compact('customerNumber'))
            ->with(compact('carts'))
            ->with(compact('orderNumber'))
            ->with(compact('discount'));
     }

     public function addOrder(Request $request){

        switch ($request->input('action')){
            case 'useCode':
                $this->validate($request, ['code' => 'required']);
                $code = Discount::where('PromotionCode',$request->get('code'))->get();
                $discount = $code->first()->DiscountAmount;
                $customerNumber = Cookie::get('ID');
                $orderNumber = Orders::latest('orderNumber')->first()->orderNumber;
                $orderNumber += 1;
                $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
                return view('addRday')
                    ->with(compact('customerNumber'))
                    ->with(compact('carts'))
                    ->with(compact('orderNumber'))
                    ->with(compact('discount'));
            break;
            case 'Confrim':
                $this->validate($request, ['rday' => 'required']);
                $orderNumber = Orders::latest('orderNumber')->first()->orderNumber;
                $orderNumber += 1;
                $customerNumber = Cookie::get('ID');
                $rday = $request->get('rday');
                //---------------------
                $order = new Orders([
                    'orderNumber' => $orderNumber,
                    'orderDate' => date('Y-m-d'),
                    'requiredDate' => $rday,
                    'customerNumber' => $customerNumber,
                ]);
                $order->timestamps = false;
                $order->save();
        
                // //---------------------
                $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
                $line = 1;
                foreach($carts as $cart){
                     $details = new Orderdetail([
                    'orderNumber' => $orderNumber,
                    'productCode' => $cart['productCode'],
                    'quantityOrdered' => $cart['quantityOrdered'],
                    'priceEach' =>  $cart['priceEach'],
                    'orderLineNumber'=> $line,
                    ]);
                    $details->timestamps = false;
                    $details->save();
                    $line+=1;
                }
                Cart::truncate(); //delete data cart
                //---------------------
                
                return view('addOrder')
                    ->with(compact('customerNumber'))
                    ->with(compact('carts'))
                    ->with(compact('rday'))
                    ->with(compact('orderNumber'));
            break;
        }

     }

}
