<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payments::all()->toArray();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        return view('payments.create');
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customerNumber' => 'required',
            'checkNumber' => 'required',
            'paymentDate' => 'required',
            'amount' => 'required']);
        $employee = new Employees([
            'customerNumber' => $request->get('customerNumber'),
            'checkNumber' => $request->get('checkNumber'),
            'paymentDate' => $request->get('paymentDate'),
            'amount' => $request->get('amount'),
        ]);
        $employee->timestamps('paymentDate');
        $employee->save();

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
