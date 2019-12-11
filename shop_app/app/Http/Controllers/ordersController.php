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
}