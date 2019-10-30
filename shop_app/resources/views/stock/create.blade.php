@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')

<section id="add" class="container">
        <div class="form-wrap">
          <h1>Product Stock In</h1>
        
          <form action="{{url('stock')}}" method="POST">
            {{csrf_field()}}
            <div class="input-group">
              <label for="ProductID">Product ID</label>
              <input type="number" name="productID" id="productID" class="input-box" placeholder=""
                maxlength="50" >
            </div>
            <div class="input-group">
              <label for="amount">Amount of Product</label>
              <input type="number" name="amount" id="amount" class="input-box" placeholder=""
              maxlength="50" >
            </div>
            <input type="submit" value="Add" class="btn btn-reverse">
          </form>
        </div>
      </section>
    


@endsection
