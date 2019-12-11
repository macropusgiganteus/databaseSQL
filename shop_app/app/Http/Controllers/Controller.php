<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Customers;
use App\Discount;
use App\Orderdetail;
use App\Orders;
use App\payments;
use App\Products;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addrequiredDay()
    {
        $discount = 0;
        $code = "";
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

    public function addOrder(Request $request)
    {
        switch ($request->input('action')) {
            case 'useCode':
                $this->validate($request, ['code' => 'required']);
                $code = Discount::where('PromotionCode', $request->get('code'))->get();
                $discount = $code->first()->DiscountAmount;
                $code = $code->first()->PromotionCode;
                $customerNumber = Cookie::get('ID');
                $orderNumber = Orders::latest('orderNumber')->first()->orderNumber;
                $orderNumber += 1;
                $carts = Cart::where('customerNumber', $customerNumber)->get()->toArray();
                return view('addRday')
                    ->with(compact('customerNumber'))
                    ->with(compact('carts'))
                    ->with(compact('orderNumber'))
                    ->with(compact('discount'))
                    ->with(compact('code'));
                break;
            case 'Confrim':
                $total = $request->input('total');
                $cookie = cookie('total', $request->input('total'));
                $this->validate($request, ['rday' => 'required']);
                $orderNumber = Orders::latest('orderNumber')->first()->orderNumber;
                $orderNumber += 1;
                $customerNumber = Cookie::get('ID');
                $rday = $request->get('rday');
                //---------------------
                if($request->get('code') != null){
                    $code = Discount::where('PromotionCode', $request->get('code'))->first();
                    $codeAmount  = ($code->first()->Count) - 1;
                    $code->timestamps = false;
                    $code->update(['Count' => $codeAmount]);
                }

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
                foreach ($carts as $cart) {
                    $details = new Orderdetail([
                        'orderNumber' => $orderNumber,
                        'productCode' => $cart['productCode'],
                        'quantityOrdered' => $cart['quantityOrdered'],
                        'priceEach' => $cart['priceEach'],
                        'orderLineNumber' => $line,
                    ]);
                    $details->timestamps = false;
                    $details->save();
                    $line += 1;

                    $product = Products::where('productCode',$cart['productCode'])->first();
                    $qtyProduct = $product->first()->quantityInStock;
                    $qtyProduct = $qtyProduct - $cart['quantityOrdered'] ;
                    $product->timestamps = false;
                    $product->update(['quantityInStock' => $qtyProduct]);
                }
                //---------------------------

                Cart::truncate(); //delete data cart
                //---------------------
               
                return view('addOrder')
                    ->with(compact('customerNumber'))
                    ->with(compact('carts'))
                    ->with(compact('rday'))
                    ->with(compact('orderNumber'))
                    ->with(compact('total'));
                break;
        }

    }

    public function calpoint()
    {
        $point = payments::select('*')->get()->toArray();
        foreach ($point as $cus) {
            $amount = $cus['amount'];
            $amount = ($amount / 100) * 3;
            $amount = intval($amount);
            $pay = payments::where('checkNumber', $cus['checkNumber'])->get()->first();
            $pay->point = $amount;
            $pay->timestamps = false;
            $pay->update();
        }
        $cus = Customers::select('*')->get()->toArray();
        foreach ($cus as $cust) {
            //dd($cust['sumpoint']);
            $custo = Customers::where('customerNumber', $cust['customerNumber'])->get()->first();
            $custo->sumpoint = 0;
            $custo->timestamps = false;
            $custo->save();
        }
        foreach ($point as $pay) {
            $customer = Customers::where('customerNumber', $pay['customerNumber'])->get()->first();
            $customer->sumpoint += $pay['point'];
            $customer->timestamps = false;
            $customer->update();
        }

        return redirect()->back()->with('success', 'Update point is success');
    }
}
