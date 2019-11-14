<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customers;

class CustomersController extends Controller
{
    public function index(){
            $customers = customers::all()->toArray();
            return view('customers', compact('customers'));
    }
}
