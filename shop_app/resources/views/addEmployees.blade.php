@extends('layouts.AllLayout')
@section('title','SHOP')
@section('content')
<section id="add" class="container">
    <div class="form-wrap">
      <h1>Add An Employee</h1>
      


      <form action="/employees/add" method="POST">
        <div class="input-group">
          <label for="title">Job title</label>
          <input type="text" name="jobTitle" id="title" class="input-box" placeholder=""
            maxlength="50" >
        </div>
        <div class="input-group">
          <label for="technologies">First Name</label>
          <input type="text" name="firstName" id="technologies" class="input-box" placeholder=""
          maxlength="50" >
        </div>
        <div class="input-group">
          <label for="technologies">Last Name</label>
          <input type="text" name="lastName" id="technologies" class="input-box" placeholder=""
          maxlength="50" value=>
        </div>
        <div class="input-group">
          <label for="budget">Office Number</label>
          <input type="number" name="officeCode" id="budget" class="input-box" placeholder="" >
        </div>
        <div class="input-group">
          <label for="budget">Employee Number</label>
          <input type="number" name="employeeNumber" id="budget" class="input-box" placeholder="" >
        </div>
        <div class="input-group">
          <label for="budget">Supervisoer</label>
          <input type="number" name="reportsTo" id="budget" class="input-box" placeholder="Supervisor's employee number">
        </div>
        <div class="input-group">
          <label for="budget">Extension</label>
          <input type="tex" name="extension" id="budget" class="input-box" placeholder="Extension" >
        </div>
        <div class="input-group">
          <label for="budget">Contact Email</label>
          <input type="email" name="email" id="contactemail" class="input-box" placeholder="" 
         >
        </div>
        <input type="submit" value="Add Employee" class="btn btn-reverse">
      </form>
    </div>
  </section>

@endsection