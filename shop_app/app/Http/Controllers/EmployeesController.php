<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;

class EmployeesController extends Controller
{
    public function index(){
            $employees = Employees::all()->toArray();
            return view('employees', compact('employees'));
    }
}
