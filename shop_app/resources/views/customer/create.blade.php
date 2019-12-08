@extends('layouts.AllLayout')
@section ('title','Add Customer')
@section('content')

  {{-- alert --}}
  <section class="container">
    @if(count($errors)>0)
    <div class="w3-panel w3-red"align="center">
      <ul>
        @foreach ($errors->all() as $error)
      <li>{{$error}}</li>   
        @endforeach
      </ul>
    </div>
    @endif


    @if(\Session::has('success'))
    <div class="w3-panel w3-green " align="center">
    <p>{{\Session::get('success')}}</p>
    </div>
    @endif
  </section>
  <section id="add" class="container">
      <div class="form-wrap"><h1>Register Customer</h1></div>
      <div class="gig">
      
      {{-- form --}}
      <form method="post" action={{url('customers')}}>
          {{csrf_field()}}
          <h2>Customer number</h2>
          <div class="input-group">
            <input type="number" name="customerNumber" id="credit" class="input-box" maxlength="20">
        </div>
        <h2>First Name</h2>
        <div class="input-group">
          <input type="text" name="contactFirstName" id="first_name" class="input-box" maxlength="50">
        </div>
        <h2>Last Name</h2>
        <div class="input-group">
          <input type="text" name="contactLastName" id="last_name" class="input-box" maxlength="50">
        </div>
        <h2>Company</h2>
        <div class="input-group">
          <input type="text" name="customerName" id="company" class="input-box" maxlength="50">
        </div>
        <h2>Addrres</h2>
        <div class="input-group">
          <input type="text" name="addressLine1" id="addr" class="input-box" maxlength="100">
        </div>
        <table>
          <tr>
            <th><h2>City</h2></th>
            <th><h2>State</h2></th>
            <th><h2>Country</h2></th>
          </tr>
          <tr>
            <td>
                <div class="input-group">
                  <input type="text" name="city" id="city" class="input-box" maxlength="20">
                </div>
            </td>
            <td>
                <div class="input-group">
                  <input type="text" name="state" id="state" class="input-box" maxlength="20">
                </div>
            </td>
            <td style="width:50%">
                <div class="input-group">
                    <input type="text" name="country" id="country" class="input-box" maxlength="50">
                </div>
            </td>
          </tr>
        </table>
        <table>
          <tr>
            <th><h2>Postal Code</h2></th>
            <th><h2>Credit limit</h2></th>
            <th><h2>Phone</h2></th>
          </tr>
          <tr>
            <td>
                <div class="input-group">
                  <input type="number" name="postalCode" id="postal_code" class="input-box" maxlength="20">
                </div>          
            </td>
            <td>
                <div class="input-group">
                    <input type="number" name="creditLimit" id="credit" class="input-box" maxlength="20">
                </div>
            </td>
            <td style="width:50%">
                <div class="input-group">
                    <input type="tel" name="phone" id="phone" class="input-box" maxlength="20">
                </div>
            </td>
          </tr>
      
        </table>
        </div>
      </div>
      <div class="gig">
        <table>
          <h2>Employee Number</h2>
                <div class="input-group">
                    <input type="number" name="salesRepEmployeeNumber" id="e_num" class="input-box" maxlength="20">
                </div>
                <input type="submit" value="Add" class="btn btn-reverse">
          </tr>
        </table>
      </div>
      

    </form>
  </section>

@endsection