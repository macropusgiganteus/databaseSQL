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
        <a href="/" class="btn btn-reverse">Add an employee</a>
    </div>
    <br><br>
    <div class="gig">
    <h3>Job title :</h3>
    <h2>Name :</h2>
    </div>

    
  </section>

@endsection

  
