@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section('title','SHOP')
@section('content')
<section id="add" class="container">
    <div class="form-wrap">
      <h1>Add An Employee</h1>
      
      <form action="{{action('EmployeesController@store')}}" method="POST">
        {{csrf_field()}}
        <div class="input-group">
         <select name="jobTitle" id="jobTitle" class="form-control vendor">
            <option value="">Select Job Titlle</option>
            <option value="President">President</option>
            <option value="VP Sales">VP Sales</option>
            <option value="VP Marketing">VP Marketing</option>
            <option value="Sales Manager (APAC)">Sales Manager (APAC)</option>
            <option value="Sale Manager (EMEA)">Sale Manager (EMEA)</option>
            <option value="Sales Manager (NA)">Sales Manager (NA)</option>
            <option value="Sales Rep">Sales Rep</option>
        </select>
        </div>
        <div class="input-group">
          <label for="firstName">First Name</label>
          <input type="text" name="firstName" id="firstName" class="input-box" placeholder=""
          maxlength="50" >
        </div>
        <div class="input-group">
          <label for="lastName">Last Name</label>
          <input type="text" name="lastName" id="lastName" class="input-box" placeholder=""
          maxlength="50" value=>
        </div>
        <div class="input-group">
          <label for="officeCode">Office Number</label>
          <input type="number" name="officeCode" id="officeCode" class="input-box" placeholder="" >
        </div>
        <div class="input-group">
          <label for="employeeNumber">Employee Number</label>
          <input type="number" name="employeeNumber" id="employeeNumber" class="input-box" placeholder="" >
        </div>
        <div class="input-group">
          <label for="reportsTo">Supervisoer</label>
          <input type="number" name="reportsTo" id="reportsTo" class="input-box" placeholder="Supervisor's employee number">
        </div>
        <div class="input-group">
          <label for="extension">Extension</label>
          <input type="tex" name="extension" id="extension" class="input-box" placeholder="Extension" >
        </div>
        <div class="input-group">
          <label for="email">Contact Email</label>
          <input type="email" name="email" id="email" class="input-box" placeholder="" 
         >
        </div>
        <input type="submit" value="Add Employee" class="btn btn-reverse">
      </form>
    </div>
  </section>

@endsection