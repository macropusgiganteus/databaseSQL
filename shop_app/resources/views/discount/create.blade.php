@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')

<section id="add" class="container">
        <div class="form-wrap">
          <h1>Promotions 50% Discount</h1>
  
              
          
          {{-- form --}}
          <form action="{{url('discount')}}" method="POST">
            {{csrf_field()}}
            <div class="input-group">
              <label>Promotion Code</label>
              <input type="text" name="promotionId" id="promotion" class="input-box" placeholder="Add Promotion Id."
                maxlength="50" >
            </div>
            <div class="input-group">
                    <label>Count</label>
                    <input type="text" name="count" id="count" class="input-box" placeholder="Add Number Promotion Used."
                      maxlength="50" >
                  </div>
            <div class="input-group">
              <label>Expiry Date</label>
              <input type="Date" name="exp" id="exp" class="input-box" placeholder=""
              maxlength="50" >
            </div>
          <input type="submit"  value="Add" class="btn btn-reverse">
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