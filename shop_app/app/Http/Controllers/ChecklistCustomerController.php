<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

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
            return redirect()->route('product.index');
        }else{
            return redirect()->back()->with('unsuccess','Please register');
        }
    }

}
