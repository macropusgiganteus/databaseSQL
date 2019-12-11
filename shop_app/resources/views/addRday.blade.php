@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section('title','SHOP')
@section('content')
<section id="gigs" class="container">
    <div class="row">
        <div class="col-md-6"><h2>Order number : #</h2></div>
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
            <th>      ฿</th>
          </tr>
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
                  <td><input type="text" class="input-box" name="code" id="code"></td>
                  <td><button  name="useCode" id="useCode" class="btn btn-success">Apply</button></td>
              </tr>
          </table>
        </section>
        
        <section id="gigs" class="container">
            <table class="table table-bordered table-striped">
                <tr align="center">
                  <th width="50%"><a href="/cart/index" name="back" id="back" class="btn btn-danger">Back</a></th>
                  <th width="50%"><button name="OK" id="OK" class="btn btn-success">Confrim</button></th>
                </tr>
            </table>
          </section>
  </form>


  
@endsection