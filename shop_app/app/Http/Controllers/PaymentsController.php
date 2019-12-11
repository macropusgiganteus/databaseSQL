<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Http\Controllers\Controller;
use App\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payments::all()->toArray();

        return view('payments.index')
            ->with(compact('payments'));
    }

    public function create()
    {
        // return $request->input('total');
        return view('payments.create');
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customerNumber' => 'required',
            'checkNumber' => 'required',
            'amount' => 'required']);
            $point =  $request->get('amount') / 100 ;
            $point = floor($point) * 3;

        $payments = new Payments([
            'customerNumber' => $request->get('customerNumber'),
            'checkNumber' => $request->get('checkNumber'),
            'paymentDate' => date('Y-m-d'),
            'amount' => $request->get('amount'),
            'point' => $point,
        ]);
        $customer = Customers::where('customerNumber', $request->get('customerNumber'))->get()->first();
        $customer->sumpoint += $point;
        $customer->timestamps = false;
        $customer->save();

        $payments->timestamps = false;
        $payments->save();

        return redirect('/payments');
    }

    public function edit($customerNumber)
    {

        $employees = Employees::where('employeeNumber', $employeeNumber)->first();
        return view('employee.editEmployee', compact('employees', 'employeeNumber'));
    }

    public function update(Request $request, $employeeNumber)
    {
        $this->validate($request,
            ['employeeNumber' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'officeCode' => 'required',
                'reportsTo' => 'required',
                'jobTitle' => 'required',
                'extension' => 'required',
            ]);
        $employees = Employees::where('employeeNumber', $request->get('employeeNumber'))->first();
        $employees->employeeNumber = $request->input('employeeNumber');
        $employees->firstName = $request->input('firstName');
        $employees->lastName = $request->input('lastName');
        $employees->email = $request->input('email');
        $employees->officeCode = $request->input('officeCode');
        $employees->reportsTo = $request->input('reportsTo');
        $employees->jobTitle = $request->input('jobTitle');
        $employees->extension = $request->input('extension');
        $employees->timestamps = false;
        $employees->save();
        return redirect('/payments');
    }

    public function destroy()
    {

    }
}
