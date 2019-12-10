@extends('layouts.AllLayout')
@section('title','SHOP')
@section('content')
<section id="add" class="container">
    <div class="form-wrap">
      <h1>NewOrder</h1>

      <form action="{{url('addorders')}}" method="POST">
        {{csrf_field()}}
        <div class="input-group">
          <label for="title">orderNumber</label>
          <input type="number" name="orderNumber" id="title" class="input-box" placeholder=""
            maxlength="5" >
        </div>
        <div class="input-group">
          <label for="technologies">requiredDate</label>
          <input type="Date" name="requiredDate" id="technologies" class="input-box" placeholder=""
          maxlength="50" >
        </div>
        <br>
        <div class="input-group">
          <label for="technologies"> orderDate  : <?php echo Date("m-d-Y"); ?> </label>
        </div>
        <br>
        <div class="input-group">
            <label for="technologies"> orderDate  : <?php echo Date("m-d-Y"); ?> </label>
        </div>
       
        
        {{-- <div style="overflow-x:auto; white-space: nowrap;">
    <table class="table table-bordered table-striped">
      <tr>
        <th>orderNumber</th>
        <th>orderDate</th>
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
  </div> --}}
      </form>
    </div>
  </section>

@endsection