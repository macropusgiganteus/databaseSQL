@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section('title','SHOP')
@section('content')
<section class="container">
    <div class="form-wrap">
      <h1>Edit Employee informations</h1>
      
      <form action="{{action('EmployeesController@update', $employeeNumber)}} method="POST">
          @csrf
          @method('PUT')
        {{csrf_field()}}
        <div class="input-group">
          <label for="title">Job title</label>
          <input type="text" name="jobTitle" id="title" class="input-box" placeholder=""
            maxlength="50" value="{{$employees->jobTitle}}">
        </div>
        <div class="input-group">
          <label for="technologies">First Name</label>
          <input type="text" name="firstName" id="technologies" class="input-box" placeholder=""
          maxlength="50" value="{{$employees->firstName}}">
        </div>
        <div class="input-group">
          <label for="technologies">Last Name</label>
          <input type="text" name="lastName" id="technologies" class="input-box" placeholder=""
          maxlength="50" value="{{$employees->lastName}}">
        </div>
        <div class="input-group">
          <label for="budget">Office Number</label>
          <input type="number" name="officeCode" id="budget" class="input-box" placeholder="" value="{{$employees->officeCode}}">
        </div>
        <div class="input-group">
          <label for="budget">Employee Number</label>
          <input type="number" name="employeeNumber" id="budget" class="input-box" placeholder="" value="{{$employees->employeeNumber}}">
        </div>
        <div class="input-group">
          <label for="budget">Supervisoer</label>
          <input type="number" name="reportsTo" id="budget" class="input-box" placeholder="Supervisor's employee number"
          value="{{$employees->reportsTo}}">
        </div>
        <div class="input-group">
          <label for="budget">Extension</label>
          <input type="tex" name="extension" id="budget" class="input-box" placeholder="Extension" value="{{$employees->extension}}">
        </div>
        <div class="input-group">
          <label for="budget">Contact Email</label>
          <input type="email" name="email" id="contactemail" class="input-box" placeholder="" 
          value="{{$employees->email}}">
        </div>
        <input type="submit" value="Update" class="btn btn-reverse">
      </form>
    </div>
  </section>


@endsection