@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')

<section id="add" class="container">
        <div class="form-wrap">
          <h1>Product Stock In</h1>
          
          
          {{-- form --}}
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


    @if(\Session::has('success'))
    <div class="w3-panel w3-green " align="center">
    <p>{{\Session::get('success')}}</p>
    </div>
    @endif

</section>

@endsection
