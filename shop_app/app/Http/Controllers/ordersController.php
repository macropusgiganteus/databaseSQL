<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Orderdetail;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all()->toArray();
        $inProcess = Orders::where('status' , '=' , 'in process')->where('shippedDate' , '<=' , date('Y-m-d'))->get();
        foreach($inProcess as $item){
                $item->timestamps = false;
                $item->update(['status' => 'Shipped']);
                $item->save();  
                
        }
        return view('order.index')
        ->with(compact('orders'));
        
    }

    public function status(Request $request)
    {
        $order = Orders::where('orderNumber' , $request->input('orderNumber'))->first();
        $order->status = $request->input('status');
        $order->shippedDate = $request->input('shippedDate');
        $order->comments = $request->input('comments');
        $order->timestamps = false;
        $order->update();

        return redirect()->back()->with('success');
    }

    public function show()
    {
        $order = Orders::select('*')->get()->toArray();
        $orderdetail = Orderdetail::select('*')->get()->toArray();
        foreach ($order as $or) {
            // return $or;
            $temp = 0;
            foreach($orderdetail as $orde){
                // return $orde;
                if($or['orderNumber'] == $orde['orderNumber'])
                {
                    $temp2 = $orde['quantityOrdered'] * $orde['priceEach'];
                    $temp += $temp2; 
                }
           }
           $temp = ($temp / 100);
           $temp = floor($temp) * 3;
           $orders = Orders::where('orderNumber', $or['orderNumber'])->get()->first();
           $orders->point = $temp;
           $orders->timestamps = false;
           $orders->update();
        //    return $orders['point'];
        }
        return redirect()->back()->with('success', 'Update point is success');
    }
}