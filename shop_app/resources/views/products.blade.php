@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')

  <section id="gigs" class="container">
    <form action="/products/search" class="search-form">
      <i class="fas fa-search"></i>
      <input type="search" name="term" placeholder="Enter a product name">
      <input type="submit" value="Search">
    </form>
</section>


<section id="gigs" class="container">
  <form method="GET">
    <h1>Products</h1>
    <div>
    
       <li class="dropdown" method="post"> 
            <h4 class="dropbtn"><a class="btn btn-reverse">Product Scale</a></h4>
            <div class="dropdown-content">
                <a href="" class="btn btn-reverse" name="1:10">1:10</a>
                <a href="" class="btn btn-reverse">1:12</a>
                <a href="" class="btn btn-reverse">1:18</a>
                <a href="" class="btn btn-reverse">1:24</a>
                <a href="" class="btn btn-reverse">1:32</a>
                <a href="" class="btn btn-reverse">1:50</a>
                <a href="" class="btn btn-reverse">1:72</a>
                <a href="" class="btn btn-reverse">1:700</a>
            </div>
      </li>  
     
 
   
    <br><br>
    
    @foreach($products as $value)
      <div class="gig" >
        <div>
            <center>   <h2>Products_Code : # {{$value->productCode}} </h2> </center>
              <h3>Product Name : {{$value->productName}} </h3>
                <ul>
                  <li>Product Line : {{$value->productLine}}<br></li>
                  <li>Product Scale : {{$value->productScale}}<br></li>
                </ul>
                <ul>
                  <li>Description : {{$value->productDescription}}<br></li>
                </ul>
           
               <br>
        </div>
      </div><br>
    @endforeach
    
  </section>
@endsection