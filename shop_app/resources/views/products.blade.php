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
    <li class="dropdown"> 
          <h4 class="dropbtn"><a class="btn btn-reverse">Product Scale</a></h4>
          <div class="dropdown-content">
           @foreach ($products as $key => $scale)
          <a href="{{action('ProductsController@scale',$key)}}">{{$key}}</a>
            {{-- <a href="{{action('ProductsController@scale',$key)}}" class="btn btn-reverse" value="{{$key}}">{{$key}}</a> --}}
           @endforeach 
          </div>
    </li> 

    <li class="dropdown"> 
          <h4 class="dropbtn"><a class="btn btn-reverse">Product Vendor</a></h4>
          <div class="dropdown-content">
           @foreach ($products1 as $key => $vendor)
            <a href="" class="btn btn-reverse" value="{{$key}}">{{$key}}</a>
           @endforeach 
          </div>
    </li> 
    <a href="/products/add" class="btn btn-reverse">Add product</a>
    </div>
    <br><br>
    @foreach ($products as $scale)
      @foreach ($scale as $product)

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
    @endforeach
    
  </section>
@endsection