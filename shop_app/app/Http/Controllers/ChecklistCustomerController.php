<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Illuminate\Support\Facades\Cookie;


class ChecklistCustomerController extends Controller
{
    public function checklist(Request $request)
    {
        $this->validate($request,[
            'customerNumber' => 'required'
        ]);

        $customerNumber = $request->input('customerNumber');
        
        $checkLogin = DB::table('customers')->select('customerNumber')->where(['customerNumber'=>$customerNumber])->get();
        if(count($checkLogin) > 0){
            $cookie = cookie('ID', $customerNumber);
            return redirect()->route('cart.index')->cookie($cookie);
        }else{
            return redirect()->back()->with('unsuccess','Please register');
        }
    }

}
