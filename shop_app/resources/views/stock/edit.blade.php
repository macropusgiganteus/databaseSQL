@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')

<section id="add" class="container">
        <div class="form-wrap">
          <h1>Edit data reception</h1>
          
          
          {{-- form --}}
          <form action="{{action('StockInController@update', $id)}}" method="POST">
            {{csrf_field()}}
            <div class="input-group">
              <label for="ProductID">Product ID</label>
            <input type="number" name="productID" id="productID" class="input-box" placeholder="" value="{{$stock->productID}}"
                maxlength="50" >
            </div>
            <div class="input-group">
              <label for="amount">Amount of Product</label>
              <input type="number" name="amount" id="amount" class="input-box" placeholder="" value="{{$stock->amount}}"
              maxlength="50" >
            </div>
            <input type="submit" value="Update" class="btn btn-reverse">
            <input type="hidden" name="_method" value="PATCH" />
          </form>
        </div>
      </section>

    {{-- alert --}}

  <section class="container">
    @if(count($errors)>0)
    <div class="w3-panel w3-red"align="center">
      <ul>
        @foreach ($errors->all() as $error)
      <li>{{$error}}</li>   
        @endforeach
      </ul>
    </div>
    @endif

</section>

@endsection
