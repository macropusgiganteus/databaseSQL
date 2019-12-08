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


<section id="gigs" >
  <form method="GET" action="{{action('ProductsController@index')}}">
    <h1 class="container">Products</h1>
    <div class="container">
      <select name="scale" id="scale" class="form-control scale">
        <option value="">Product Scale</option>
        @foreach ($productScale as $productScale)
          <input type="submit" value="Enter">
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
        <a onclick="filter(document.getElementById('scale').value)" class="btn btn-reverse" type="submit">Enter</a>
    <a href="/products/create" class="btn btn-reverse">Add product</a>
    </div>
    <br><br>

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
          <th>Edit</th>
          <th>Delete</th>
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
          <td><a href="{{action('ProductsController@edit', $product['productCode'])}}" class="btn btn-primary">Edit</a></td>
          <td>
          <form method="post" class="delete_form" action="{{action('ProductsController@destroy', $product['productCode'])}}">
          {{csrf_field()}}
          {{ method_field('DELETE') }} 
          <input type="hidden" name="_method" value="DELETE" />
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          </td>
      </tr>  
        
        @endforeach
  </table>
  </section>
  

@endsection