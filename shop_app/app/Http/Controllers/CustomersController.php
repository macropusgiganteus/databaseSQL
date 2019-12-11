<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all()->toArray();

        return view('customer.customers')
            ->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('customer.addCustomers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'customerNumber' => 'required',
            'FirstName' => 'required',
            'LastName' => 'required',
            'customerName' => 'required',
            'addressLine1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postalCode' => 'required',
            'phone' => 'required',
            //state not required
        ]);
        $customer = new customers([
            'customerNumber' => $request->get('customerNumber'),
            'customerName' => $request->get('customerName'),
            'contactLastName' => $request->get('FirstName'),
            'contactFirstName' => $request->get('LastName'),
            'phone' => $request->get('phone'),
            'addressLine1' => $request->get('addressLine1'),
            'addressLine2' => $request->get('addressLine2'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'postalCode' => $request->get('postalCode'),
            'country' => $request->get('country'),
            'salesRepEmployeeNumber' => $request->get('salesRepEmployeeNumber'),
            'creditLimit' => $request->get('creditLimit')]);
        $customer->timestamps = false;
        $customer->save();
        return redirect('/customers')->with('success', 'New products have been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customerNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($customerNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customerNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customerNumber)
    {
        $customers = Customers::where('customerNumber', $customerNumber);
        $customers->delete();
        return redirect('/customers');
    }

}
