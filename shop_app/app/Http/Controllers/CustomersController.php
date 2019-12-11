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
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'addr' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'phone' => 'required',
            'e_num' => 'required',
            //state not required
        ]);
        $add = new customers([
            'contactFirstName' => $request->get('first_name'),
            'contactLastName' => $request->get('last_name'),
            'customerName' => $request->get('company'),
            'addressLine1' => $request->get('addr'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postalCode' => $request->get('postal_code'),
            'phone' => $request->get('phone'),
            'salesRepEmployeeNumber' => $request->get('e_num'),
            'state' => $request->get('state'),
            'creditLimi' => $request->get('credit')]);
        $add->save();
        return redirect()->route('check_customerID')->with('success', 'New products have been added.');
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
