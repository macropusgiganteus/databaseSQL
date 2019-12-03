<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all()->toArray();
        return view('employee.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.addEmployees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['employeeNumber' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'officeCode' => 'required',
            'reportsTo' => 'required',
            'jobTitle' => 'required',
            'extension' => 'nullable']);
        $employee = new Employees([
            'employeeNumber' => $request->get('employeeNumber'),
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName'),
            'email' => $request->get('email'),
            'officeCode' => $request->get('officeCode'),
            'reportsTo' => $request->get('reportsTo'),
            'jobTitle' => $request->get('jobTitle'),
            'extension' => $request->get('extension'),
        ]);
        $employee->timestamps = false;
        $employee->save();

        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($employeeNumber)
    {
        $employees = Employees::where('employeeNumber', $employeeNumber)->first();
        return view('employee.editEmployee', compact('employees', 'employeeNumber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $employees = Employees::where('employeeNumber', $employeeNumber)->first();
        $employees->employeeNumber = $request->get('employeeNumber');
        $employees->firstName = $request->get('firstName');
        $employees->lastName = $request->get('lastName');
        $employees->email = $request->get('email');
        $employees->officeCode = $request->get('officeCode');
        $employees->reportsTo = $request->get('reportsTo');
        $employees->jobTitle = $request->get('jobTitle');
        $employees->extension = $request->get('extension');
        $employees->timestamps = false;
        $employees->save();
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employeeNumber)
    {
        $employees = Employees::where('employeeNumber', $employeeNumber);
        $employees->delete();
        return redirect('/employees');
    }
}
