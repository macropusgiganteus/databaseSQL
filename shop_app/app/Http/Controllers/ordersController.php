<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all()->toArray();
        $this->shipped();
        return view('order.index')
        ->with(compact('orders'));
    }

    public function status(Request $request)
    {
        $order = Orders::where('orderNumber' , $request->input('orderNumber'))->first();
        $order->status = $request->input('status');
        $order->timestamps = false;
        $order->update();
        return redirect()->back()->with('success','New discount code has been created.');
    }

    public function shipped()
    {
        $inProcess = Orders::where('status' , '=' , 'in process')->get();
        if(Orders::where('status',$inProcess)){
        $order = Orders::where('shippedDate' , '>=' , date('Y-m-d'))->get();
        $order->status = 'Shipped'; 
        }
        return $order;
        $order->update(); 
    }
}