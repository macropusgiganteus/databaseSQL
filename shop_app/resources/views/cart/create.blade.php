@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','Cart')
@section('content')
@php
    $total = 0
@endphp

  <section id="gigs" class="container">
    <form action="/products/search" class="search-form">
      <i class="fas fa-search"></i>
      <input type="search" name="term" placeholder="Enter a product name">
      <input type="submit" value="Search">
    </form>
  </section>

  <section class="container">
     
        <div class="row">
            <div class="col-md-6"><h2>Cart Detail [# {{$customerNumber}} ]</h2></div>
            <div class="col-md-6" align="right">
              <button name="clear_cart" id="clear_cart" class="btn-warning btn-xs">clear</button>
            </div>
          </div>
        </div>
 
      <table class="table table-bordered table-striped">
        <tr>
            <th>productCode</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        @foreach($carts as $item)
        <tr>
            {{-- <td>{{$item['customerNumber']}}</td> --}}
            <td>{{$item['productCode']}}</td>
            <td>{{$item['quantityOrdered']}}</td>
            <td>{{$item['priceEach']}}</td>
            <td>{{ $item['quantityOrdered'] * $item['priceEach'] }}</td>
            {{ $total += $item['quantityOrdered'] * $item['priceEach']}}
            <td><a href="{{action('CartController@destroy', $item['productCode'])}}" class="btn btn-danger">Delete</a></td>
        </tr>  
        @endforeach
        <tr>
          <th>Total price : {{ $total }} ฿</th>
        </tr>
      </div>
      </table>
      <div class="col-md-6">
        <button name="clear_cart" id="clear_cart" class="btn btn-success">Confirm</button>
      </div>
  </section>
  

  <section id="gigs" >
    <form method="GET" action="{{action('CartController@index')}}">
      <h1 class="container">Products</h1>
      <div class="container">
        <select name="scale" id="scale" class="form-control scale">
          <option value="">Product Scale</option>
          @foreach ($productScale as $productScale)
          <option value="{{$productScale['productScale']}}">{{$productScale['productScale']}}</option>
          @endforeach
        </select>
        <br>
        <select name="vendor" id="vendor" class="form-control vendor">
            <option value="">Product Vendor</option>
            @foreach ($productVendor as $productVendor)
              <option value="{{$productVendor['productVendor']}}">{{$productVendor['productVendor']}}</option>
            @endforeach
          </select>
          <br>
          <input type="submit" value="Enter" class="btn btn-reverse">
          
      <a href="/products/create" class="btn btn-reverse">Add product</a>
      </div>
      <br><br>
    </form>
    <table class="table table-bordered table-striped">
        <tr>
          <th>productName</th>
          <th>productCode</th>
          <th>productDescription</th>
          <th>quantityInStock</th>
          <th>buyPrice</th>
          <th>productVendor</th>
          <th>productScale</th>
          <th>productLine</th>
          <th>MSRP</th>
          <th>Quantity</th>
          <th>Add</th>
          {{-- <th>Delete</th> --}}
      </tr>
     
        @foreach ($products as $product)
        <tr>
          <td>{{$product['productName']}}</td>
          <td>{{$product['productCode']}}</td>
          <td>{{$product['productDescription']}}</td>
          <td>{{$product['quantityInStock']}}</td>
          <td>{{$product['buyPrice']}}</td>
          <td>{{$product['productVendor']}}</td>
          <td>{{$product['productScale']}}</td>
          <td>{{$product['productLine']}}</td>
          <td>{{$product['MSRP']}}</td>
          <form action="{{action('CartController@create')}}" method="get">
            <input type="hidden" value="{{$product['productCode']}}" name="productCode">
            <td><input type="number" name="qty" id="qty" class="input-box" maxlength="5" value="1"></td>
            <td><button type="submit" class="btn btn-primary">Add</button></td>
      </form>
      </tr>  
        @endforeach
      
  </table>
  


@endsection