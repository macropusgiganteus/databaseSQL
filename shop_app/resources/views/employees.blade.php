@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')
<section id="gigs" class="container">
    <form action="/employees/search" class="search-form">
      <i class="fas fa-search"></i>
      <input type="search" name="term" placeholder="Enter an employee number">
      <input type="submit" value="Search">
    </form>
</section>
<section id="gigs" class="container">
    <h1>Employees</h1>
    <div>
        <a href="/employees/add" class="btn btn-reverse">Add an employee</a>
    </div>
    <br><br>
    @foreach ($employees as $employee)
    <div class="gig" >
      <h3>Job title : {{$employee['jobTitle']}} </h3>
      <h2>Name: {{$employee['firstName']}} {{$employee['lastName']}}</h2>
     
      <ul>
          <li>E-mail: {{$employee['email']}}<br></li>
          <li>Office:{{$employee['officeCode']}} <br></li>
          <li>Reports to: {{$employee['reportsTo']}}<br></li>
      </ul>
      <div class="tech">
          <small>Employee number:<span> {{$employee['employeeNumber']}}</span> Extension: <span>{{$employee['extension']}}</span></small>
      </div><br>
     
    
    </div>
    @endforeach
    
    

 
  </section>

@endsection

  
