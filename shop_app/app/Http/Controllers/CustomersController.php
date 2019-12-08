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
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'customerNumber' => 'required',
            'contactFirstName' => 'required',
            'contactLastName' => 'required',
            'customerName' => 'required',
            'addressLine1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postalCode' => 'required',
            'phone' => 'required',
            'salesRepEmployeeNumber' => 'required'
            //state not required
        ]);

        $member = new Customers([
            'customerNumber' => $request->get('customerNumber'),
            'contactFirstName' => $request->get('contactFirstName'),
            'contactLastName' => $request->get('contactLastName'),
            'customerName' => $request->get('customerName'),
            'addressLine1' => $request->get('addressLine1'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postalCode' => $request->get('postalCode'),
            'phone' => $request->get('phone'),
            'salesRepEmployeeNumber' => $request->get('salesRepEmployeeNumber'),
            'state' => $request->get('state'),
            'creditLimit'=> $request->get('creditLimit')
        ]);
        $member->timestamps = false;
        $member->save();

        return redirect()->route('customer.create')->with('success','Create customer Successful!');
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
