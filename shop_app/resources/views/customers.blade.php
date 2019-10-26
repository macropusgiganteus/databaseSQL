@extends('layouts.mainLayout')

@section('content')
<section id="gigs" class="container">
    <form action="/customers/search" class="search-form">
      <i class="fas fa-search"></i>
      <input type="search" name="term" placeholder="Enter a customer number">
      <input type="submit" value="Search">
    </form>
</section>

<section id="gigs" class="container">
    <h1>Customers</h1>


    <div>
        <a href="/customers/add" class="btn btn-reverse">Add a customer</a>
    </div>
    <br><br>
  
  </section>

@endsection

  