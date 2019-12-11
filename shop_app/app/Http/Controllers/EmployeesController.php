<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EmployeesController extends Controller
{

    public function index()
    {
        $employees = Employees::all()->toArray();
        $below = [];
        switch (Cookie::get('jobtitle')) {
            case 'President':
                $below = ['VP Sales', 'VP Marketing', 'Sales Manager (APAC)', 'Sale Manager (EMEA)', 'Sales Manager (NA)', 'Sales Rep'];
                break;
            case ('VP Sales'):
                $below = ['Sales Manager (APAC)', 'Sale Manager (EMEA)', 'Sales Manager (NA)', 'Sales Rep'];
                break;
            case ('VP Marketing'):
                $below = [];
                break;
            case ('Sales Manager (APAC)'):
                $below = ['Sales Rep'];
                break;
            case ('Sale Manager (EMEA)'):
                $below = ['Sales Rep'];
                break;
            case ('Sales Manager (NA)'):
                $below = ['Sales Rep'];
                break;
            default:
                $below = [];
        }
        return view('employee.employees')
            ->with(compact('employees'))
            ->with(compact('below'));
    }

    public function create()
    {
        return view('employee.addEmployees');
    }

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

    public function edit($employeeNumber)
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
        return redirect()->route('employees.index');
    }

    public function promote(Request $request)
    {
        $employees = Employees::where('employeeNumber', $request->input('employeeNumber'))->first();
        $employees->timestamps = false;
        $employees->update(['jobTitle' => $request->input('jobTitle')]);
        $employees->save();
        return redirect('/employees');
    }

    public function destroy($employeeNumber)
    {
        $employees = Employees::where('employeeNumber', $employeeNumber);
        $employees->delete();
        return redirect('/employees');
    }
}
