@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','Order')
@section('content')

<section id="gigs" class="container">
    <div class="row">
        <div class="col-md-6"><h2>Order number : # {{$orderNumber}}</h2></div>
        <div class="col-md-6"><h2>Customer number : # {{$customerNumber}}</h2></div>
    </div>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="40%">Name</th>
            <th width="20%">productCode</th>
            <th width="5%">Quantity</th>
            <th width="15%">Price</th>
            <th width="20%">Total</th>
        </tr>
        @foreach($carts as $item)
        <tr>

            <td>{{$item['productName']}}</td>
            <td>{{$item['productCode']}}</td>
            <td>{{$item['quantityOrdered']}}</td>
            <td>{{$item['priceEach']}}</td>
            <td>{{ $item['quantityOrdered'] * $item['priceEach'] }}</td>
        </tr>  
        @endforeach
    </table>
  </section>

  <section class="container">
    <table  class="table table-bordered table-striped">
        <tr>
            <th>Total price:</th>
            <th> {{$total}}    ฿</th>
          </tr>
    </table>
  </section>

  <section id="gigs" class="container">
      <table class="table table-bordered table-striped">
          <tr>
            <th>Required Date</th>
            <th>Order Date</th>
          </tr>
          <tr>
            <td width="33%"><input type="date" class="input-box" name="rday" id="rday" value="{{$rday}}" disabled></td>
            <td width="33%"><input type="date" class="input-box" name="bday" id="datetime" value="<?php echo date('Y-m-d'); ?>" disabled></td>
          </tr>
      </table>
    </section>
    
    <section class="container">
        <table class="table table-bordered table-striped">
          <tr align="center">
            <th>
               <button name="clear_cart" id="clear_cart" class="btn btn-success">Home</button>
            </th>
          </tr>
        </table>
      </section>

@endsection