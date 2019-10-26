@extends('layouts.mainLayout')

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


    
  </section>

@endsection

  
