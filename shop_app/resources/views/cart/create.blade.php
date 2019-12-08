@extends('layouts.AllLayout')
@section ('title','Cart')
@section('content')

  <section id="gigs" class="container">
    <form action="/products/search" class="search-form">
      <i class="fas fa-search"></i>
      <input type="search" name="term" placeholder="Enter a product name">
      <input type="submit" value="Search">
    </form>
  </section>

  <section class="container">
        <div class="row">
            <div class="col-md-6"><h2>Cart Detail</h2></div>
            <div class="col-md-6" align="right">
              <button name="clear_cart" id="clear_cart" class="btn-warning btn-xs">clear</button>
            </div>
          </div>
    </div>
      <table class="table table-bordered table-striped">
        <tr>
            <th>productCode</th>
            {{-- <th>Name</th> --}}
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
            {{-- <td><a href="{{action('CartController@edit', $item['id'])}}" class="btn btn-primary">Edit</a></td> --}}
            <td>
            {{-- <form method="post" class="delete_form" action="{{action('CartController@destroy', $item['id'])}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Delete</button>
            </form> --}}
            </td>
        </tr>  
        @endforeach
       
      </table>
  </section>
  

  <section id="gigs" >
  <form method="GET">
    <h3 class="container">Products</h3>
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
        <a action="{{action('ProductsController@scale')}}" class="btn btn-reverse" type="submit">Enter</a>  
        <a onclick="filter(document.getElementById('scale').value)" class="btn btn-reverse" type="submit">Enter</a>
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
          {{-- <form action="{{action('CartController@edit', $product['productCode']))}}" method="POST"> --}}
            {{-- {{csrf_field()}}    --}}
            <td><input type="number" name="qty" id="qty" class="input-box" maxlength="5" value="1"></td>
          <td><a href="{{action('CartController@edit', $product['productCode'])}}" class="btn btn-success btn-block">add</a></td>
      {{-- </form> --}}
      </tr>  
        @endforeach
      
  </table>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    function filter(value){
      if(value != ''){
        console.log(value);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url:"/scale",
          method:"POST",
          data: {select:value},
          success: function(data){
            console.log(data);
          }
        });
      }
    }

    console.log(document.getElementById("value"));
  </script>
  {{-- <script type="text/javascript">
      $('.scale').change(function(){
        var select=$(this).val();
        console.log(select);
      });
  </script> --}}


@endsection