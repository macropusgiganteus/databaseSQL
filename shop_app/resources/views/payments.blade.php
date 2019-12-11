@extends('layouts.AllLayout')
@section ('title','Payment')
@section('content')

<section id="gigs" class="container">
    <h1>Payment</h1>
</section>

<section class="container">
    <div class="row">
        <div class="col-md-6"><h2>Cart Detail [# ]</h2></div>
      </div>
    </div>
  <table class="table table-bordered table-striped">
    <tr>
        <th width="40%">Name</th>
        <th width="20%">productCode</th>
        <th width="5%">Quantity</th>
        <th width="15%">Price</th>
        <th width="20%">Total</th>
        
    </tr>
   
    <tr>
        <td><input type="text" name="qty" id="qty" class="input-box" maxlength="10" value=" Lorem." disabled></td>
        <td><input type="text" name="qty" id="qty" class="input-box" maxlength="10" value=" Lorem." disabled></td>
        <td><input type="text" name="qty" id="qty" class="input-box" maxlength="5" value=" Lorem." disabled></td>
        <td><input type="text" name="qty" id="qty" class="input-box" maxlength="10" value=" Lorem." disabled></td>
        <td><input type="text" name="qty" id="qty" class="input-box" maxlength="10" value=" Lorem." disabled></td>
    </tr>
    {{-- @foreach($carts as $item)
    <tr>
        
        <td>{{$item['productCode']}}</td>
        <td>{{$item['quantityOrdered']}}</td>
        <td>{{$item['priceEach']}}</td>
        <td>{{ $item['quantityOrdered'] * $item['priceEach'] }}</td>
        <td><a href="{{action('CartController@destroy', $item['productCode'])}}" class="btn btn-danger">Delete</a></td>
    </tr>  
    @endforeach --}}
    <tr>
      <th>Total price : ? ฿</th>
    </tr>
  </div>
  </table>
  <div class="col-md-6">
    <button name="clear_cart" id="clear_cart" class="btn btn-success">Home</button>
  </div>
</section>

@endsection