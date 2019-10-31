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
    <h1>Products</h1>
    <div>
    <li class="dropdown"> 
          <h4 class="dropbtn"><a class="btn btn-reverse">Product Scale</a></h4>
          <div class="dropdown-content">
            <a href="/products/110" class="btn btn-reverse">1:10</a>
            <a class="btn btn-reverse">1:12</a>
            <a class="btn btn-reverse">1:18</a>
            <a class="btn btn-reverse">1:24</a>
            <a class="btn btn-reverse">1:32</a>
            <a class="btn btn-reverse">1:50</a>
            <a class="btn btn-reverse">1:700</a>
            <a class="btn btn-reverse">1:72</a>
          </div>
    </li> 
    <li class="dropdown"> 
          <h4 class="dropbtn"><a class="btn btn-reverse">Product Vendor</a></h4>
          <div class="dropdown-content">
            <a class="btn btn-reverse">Welly Diecast Productions</a>
            <a class="btn btn-reverse">Unimax Art Galleries</a>
            <a class="btn btn-reverse">Studio M Art Models</a>
            <a class="btn btn-reverse">Second Gear Diecast</a>
            <a class="btn btn-reverse">Red Start Diecast</a>
            <a class="btn btn-reverse">Motor City Art Classics</a>
            <a class="btn btn-reverse">Min Lin Diecast</a>
            <a class="btn btn-reverse">Highway 66 Mini Classics</a>
            <a class="btn btn-reverse">Gearbox Collectibles</a>
            <a class="btn btn-reverse">Exoto Designs</a>
            <a class="btn btn-reverse">Classic Metal Creations</a>
            <a class="btn btn-reverse">Carousel DieCast Legends</a>
            <a class="btn btn-reverse">Autoart Studio Design</a>
          </div>
    </li> 
    </div>
    <br><br>
    @foreach ($products as $product)
    <div class="gig" >
      <h1>{{$product['productName']}}   ({{$product['productCode']}})</h1>
      <p>{{$product['productDescription']}}</p>
     
      <ul>
          <li>In-stock: {{$product['quantityInStock']}}<br></li>
          <li>Price: ${{$product['buyPrice']}} /ea<br></li>
          <li>Vendor: {{$product['productVendor']}}<br></li>
          <li>Scale: {{$product['productScale']}} <br></li>
          <li>Line: {{$product['productLine']}} </li>
      </ul>
      <div class="tech">
          <small>MSRP:<span> {{$product['MSRP']}}</span></small>
      </div><br>
     
    
    </div>
    @endforeach
  </section>
@endsection