@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','Register')
@section('content')
  <section id="add" class="container">
      <div class="form-wrap">
          <h1>Register Customer</h1><br>
      
      {{-- form --}}
      <form method="post" action={{url('customers')}}>
          {{csrf_field()}}
          <label for="Customer number">Customer number</label>
          <div class="input-group">
            <input type="number" name="customerNumber" id="credit" class="input-box" maxlength="20">
        </div>
        <label for="First Name">First Name</label>
        <div class="input-group">
          <input type="text" name="FirstName" id="first_name" class="input-box" maxlength="50">
        </div>
        <label for="Last Name">Last Name</label>
        <div class="input-group">
          <input type="text" name="LastName" id="last_name" class="input-box" maxlength="50">
        </div>
        <label for="Company">Company</label>
        <div class="input-group">
          <input type="text" name="Company" id="company" class="input-box" maxlength="50">
        </div>
        <label for="Adress">Adress</label>
        <div class="input-group">
          <input type="text" name="addressLine1" id="addr" class="input-box" maxlength="100">
        </div>
        <table>
          <tr>
            <th><h4>City</h4></th>
            <th><h4>State</h4></th>
            <th><h4>Country</h4></th>
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
            <th><h4>Postal Code</h4></th>
            <th><h4>Credit limit</h4></th>
            <th><h4>Phone</h4></th>
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
        <input type="hidden" name="salesRepEmployeeNumber" value="{{ Cookie::get('employeeNumber') }}" />
        <input type="submit" value="Add" class="btn btn-reverse">
        </div>
        
     
    </form>
  </section>
  
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

@endsection