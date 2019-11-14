<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class CheckidController extends BaseController
{
    public function checkID(request $req){
        
        $validation = $req -> validate([
            'customerID' => 'required'
        ]);

        $customerID = $req->input('customerID');
        $checkLogin = DB::table('customers')->select('customerNumber')->where(['customerNumber'=>$customerID])->get();
        if(count($checkLogin) > 0){
            echo "$checkLogin";
            echo "Login completed!!";
        }else{
            echo "$checkLogin";
            echo "Please Register Customer to member";
        }
    }

}
