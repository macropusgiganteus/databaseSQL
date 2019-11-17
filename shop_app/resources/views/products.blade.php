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
      <select name="scale" id="scale" class="form-control scale">
        <option value="">Product Scale</option>
        @foreach ($productScale as $productScale)
          <option value="{{$productScale['productScale']}}">{{$productScale['productScale']}}</option>
        @endforeach
      </select>
      <select name="vendor" id="vendor" class="form-control vendor">
          <option value="">Product Vendor</option>
          @foreach ($productVendor as $productVendor)
            <option value="{{$productVendor['productVendor']}}">{{$productVendor['productVendor']}}</option>
          @endforeach
        </select>
        <button onclick="filter(document.getElementById('scale').value)">Enter</button>
    <a href="/products/add" class="btn btn-reverse">Add product</a>
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
      <a href="{{action('ProductsController@edit', $product['productCode'])}}" class="btn btn-primary">Edit</a>
      {{csrf_field()}}
    </div>
      {{-- @endforeach --}}
    @endforeach
    
  </section>
  <script>
    function filter(value){
      console.log(value);
    }
  </script>
  {{-- <script type="text/javascript">
      $('.scale').change(function(){
        var select=$(this).val();
        console.log(select);
      });
  </script> --}}

@endsection