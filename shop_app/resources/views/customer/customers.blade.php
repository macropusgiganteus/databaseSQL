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

<section id="gigs" >
    <h1 class="container">Customers</h1>
    <div class="container">
        <a href="/customers/create" class="btn btn-reverse">Add a customer</a>
        <a href="/calpoint" class="btn btn-reverse">Update point</a>
    </div>
    <br><br>
    <div style="overflow-x:auto; white-space: nowrap;">
    <table class="table table-bordered table-striped">
      <tr>
        <th>customerNumber</th>
        <th>customerName</th>
        <th>contactLastName</th>
        <th>contactFirstName</th>
        <th>phone</th>
        <th>addressLine1</th>
        <th>addressLine2</th>
        <th>city</th>
        <th>state</th>
        <th>postalCode</th>
        <th>country</th>
        <th>salesRepEmployeeNumber</th>
        <th>creditLimit</th>
        <th>sumpoint</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach ($customers as $customer)
    <tr>
      <td>{{$customer['customerNumber']}}</td>
      <td>{{$customer['customerName']}}</td>
      <td>{{$customer['contactLastName']}}</td>
      <td>{{$customer['contactFirstName']}}</td>
      <td>{{$customer['phone']}}</td>
      <td>{{$customer['addressLine1']}}</td>
      <td>{{$customer['addressLine2']}}</td>
      <td>{{$customer['city']}}</td>
      <td>{{$customer['state']}}</td>
      <td>{{$customer['postalCode']}}</td>
      <td>{{$customer['country']}}</td>
      <td>{{$customer['salesRepEmployeeNumber']}}</td>
      <td>{{$customer['creditLimit']}}</td>
      <td>{{$customer['sumpoint']}}</td>
      <td><a href="{{action('CustomersController@edit', $customer['customerNumber'])}}" class="btn btn-primary">Edit</a></td>
      <td>
      <form method="post" class="delete_form" action="{{action('CustomersController@destroy', $customer['customerNumber'])}}">
      {{csrf_field()}}
      {{ method_field('DELETE') }} 
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      </td>
  </tr>  
  @endforeach
</table>
  </div>
  </section>

@endsection

  
