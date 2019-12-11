@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section('title','SHOP')
@section('content')

<?php
  $total = 0;
?>

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
            <input type="hidden" {{$total += $item['quantityOrdered'] * $item['priceEach']}}/>
        </tr>  
        @endforeach
    </table>
  </section>

  <section class="container">
    <table  class="table table-bordered table-striped">
        
        @if($discount == 0)
          <tr>
            <th><center><h4>Total price:</h4></center></th>
            <th><center><h4>{{ $total }} ฿</h4></center></th>
          </tr>
        @else
          
          <tr>
            <th><center><h4>Price:</h4></center></th>
            <th><center><h4>{{ $total }} ฿</h4></center></th>
          </tr>
          <tr>
            <th><center><h4>Discount:</h4></center></th>
            <th><center><h4>-{{ $discount }} ฿</h4></center></th>
          </tr>
          <tr>
            @if ( ($total -= $discount) < 0)
              <th><center><h4>Total price:</h4></center></th>
              <th><center><h4>{{ 0 }} ฿</h4></center></th>
            @else
              <th><center><h4>Total price:</h4></center></th>
              <th><center><h4>{{$total}} ฿</h4></center></th>
            @endif
            
          </tr>
        @endif 
 
    </table>
     
  </section>

  <form action="{{url('/addOrder/success')}}" method="post">
    {{csrf_field()}}
      <section id="gigs" class="container">
          <table class="table table-bordered table-striped">
              <tr>
                <th>Required Date</th>
                <th>Order Date</th>
              </tr>
              <tr>
                <td width="50%"><input type="date" class="input-box" name="rday" id="rday"></td>
                <td width="50%"><input type="date" class="input-box" name="bday" id="datetime" value="<?php echo date('Y-m-d'); ?>" disabled></td>
              </tr>
              
          </table>
        </section>

        <section class="container">
          <table class="table table-bordered table-striped">
              <tr>
                  <th width="60%"><h4 align="center">Code</h4></th>
                  <th></th>
              </tr>
              
                <tr align="center">
                    @if ($discount == 0)
                      <td><input type="text" class="input-box" name="code" id="code" value=""></td>
                      <td><button type="submit" name="action" class="btn btn-success" value="useCode">Apply</button></td>
                    @else
                  
                      <td><input type="text" class="input-box" name="code" id="code" value="Code is used" disabled></td>
                      <td><input type="hidden" class="input-box" name="code" id="code" value="{{$code}}"></td>
                    @endif
                </tr>
          </table>
        </section>
        
        <section id="gigs" class="container">
            <table class="table table-bordered table-striped">
                <tr align="center">
                  <th width="50%"><a href="/cart/index" name="back" id="back" class="btn btn-danger">Back</a></th>
                  <input type="hidden" name="total" value="{{$total}}">
                  <th width="50%"><button name="action" type="submit" class="btn btn-success" value="Confrim">Confrim</button></th>
                </tr>
            </table>
          </section>
  </form>


  
@endsection