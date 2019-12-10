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
            <label for="technologies"> 	customerNumber  :  </label>
        </div>
       
        
        <section id="gigs" class="container">
          <table class="table table-bordered table-striped">
              <tr>
                  <th>CustomerID</th>
                  <th>ProductID</th>
                  <th>Price</th>
                  <th>Quantity</th>
              </tr>
              @foreach($carts as $item)
              <tr>
                  <td>{{$item['customerNumber']}}</td>
                  <td>{{$item['productCode']}}</td>
                  <td>{{$item['priceEach']}}</td>
                  <td>{{$item['quantityOrdered']}}</td>
                  {{-- <td><a href="{{action('CartController@edit', $item['id'])}}" class="btn btn-primary">Edit</a></td> --}}
                  <td>
                  {{-- <form method="post" class="delete_form" action="{{action('CartController@destroy', $item['id'])}}"> --}}
                  {{csrf_field()}}
                  </form>
                  </td>
              </tr>  
              @endforeach
          </table>
      </section>
      @endsection
      <div class="input-group">
        <label for="technologies"> 	TotalPrice  :  </label>
      </div>
      </form>
    </div>
  </section>

@endsection