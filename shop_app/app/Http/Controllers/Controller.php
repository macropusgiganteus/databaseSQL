<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\payments;
use App\Customers;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function calpoint()
    {
            $point = payments::select('*')->get()->toArray();
            foreach($point as $cus){
                $amount = $cus['amount'];
                $amount = ($amount / 100)*3;
                $amount = intval($amount);
                $pay = payments::where('checkNumber',$cus['checkNumber'])->get()->first();
                $pay->point = $amount;
                $pay->timestamps = false;
                $pay->update();
            }
            $cus = Customers::select('*')->get()->toArray();
            foreach($cus as $cust){
                //dd($cust['sumpoint']);
                $custo = Customers::where('customerNumber',$cust['customerNumber'])->get()->first();
                $custo->sumpoint = 0;
                $custo->timestamps = false;
                $custo->save();
            }
            foreach($point as $pay){
                $customer = Customers::where('customerNumber',$pay['customerNumber'])->get()->first();
                $customer->sumpoint += $pay['point'];
                $customer->timestamps = false;
                $customer->update();
            }

            return redirect()->back()->with('success', 'Update point is success');
    }
}

