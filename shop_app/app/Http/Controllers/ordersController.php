<?php

namespace App\Http\Controllers;

use App\Orders;
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
}