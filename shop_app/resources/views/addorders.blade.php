@extends('layouts.AllLayout')
@section('title','SHOP')
@section('content')
<section id="gigs" class="container">
    <div class="row">
        <div class="col-md-6"><h2>Order number : #</h2></div>
        <div class="col-md-6"><h2>Customer number : #</h2></div>
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
    </table>
        
  </section>
  <section id="gigs" class="container">
    <table class="table table-bordered table-striped">
        <tr>
          <th>Required Date</th>
          <th>Order Date</th>
        </tr>
        <tr>
          <td width="33%"><input type="date" class="input-box" name="bday"></td>
          <td width="33%"><input type="date" class="input-box" name="bday" id="datetime" value="<?php echo date('Y-m-d'); ?>" disabled></td>
        </tr>
    </table>
  </section>
  
  <section id="gigs" class="container">
      <table class="table table-bordered table-striped">
          <tr align="center">
            <th widtd="100%">
                    <button name="clear_cart" id="clear_cart" class="btn btn-success">Confrim</button>
            </th>
      </table>
    </section>

    <script>
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
    </script>
@endsection