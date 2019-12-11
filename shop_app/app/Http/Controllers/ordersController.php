<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all()->toArray();
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
}