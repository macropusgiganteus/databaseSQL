@extends('layouts.AllLayout')
@section ('title','SHOP')
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
  
    @foreach ($customers as $customer)
    <div class="gig" >
      <h3>CustomersNumber : {{$customer['customerNumber']}} </h3>
      <h2>CustomerName: {{$customer['customerName']}}</h2>
      <h2>ContactName: {{$customer['contactFirstName']}} {{$customer['contactLastName']}} </h2>
      <ul>
          <li>Phone: {{$customer['phone']}}<br></li>
          <li>Address: {{$customer['addressLine1']}} {{$customer['addressLine2']}} {{$customer['city']}}
              {{$customer['state']}} {{$customer['postalCode']}} {{$customer['country']}}<br></li>
      </ul>
      <div class="tech">
          <small>SalesRepEmployeeNumber: {{$customer['salesRepEmployeeNumber']}}</span><br> 
           CreditLimit: <span>{{$customer['creditLimit']}}</span><br>
           Memberpoint: <span>{{$customer['sumpoint']}}</span></small>
      </div><br>
     
    </div>
    @endforeach
    

  </section>

@endsection

  
