@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','SHOP')
@section('content')

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
<section id="add" class="container">
        <div class="form-wrap">
          <h1>Promotions Discount%</h1>
  
              
          
          {{-- form --}}
          <form action="{{url('discount')}}" method="POST">
            {{csrf_field()}}
            <div class="input-group">
              <label>Promotion Code</label>
              <input type="text" name="PromotionCode" id="PromotionCode" class="input-box" placeholder="Add Promotion code."
                maxlength="50" >
            </div>
            <div class="input-group">
                    <label>Count</label>
                    <input type="text" name="Count" id="Count" class="input-box" placeholder="Add Number Promotion Used."
                      maxlength="50" >
                  </div>
            <div class="input-group">
              <label>Expiry Date</label>
              <input type="Date" name="EXP_date" id="EXP_date" class="input-box" placeholder=""
              maxlength="50" >
            </div>
            <div class="input-group">
              <label>Discount amount</label>
              <input type="number" name="DiscountAmount" id="DiscountAmount" class="input-box" placeholder="Amount of discount."
                maxlength="50" >
            </div>
          <input type="submit"  value="Add" class="btn btn-reverse">
          </form>
        </div>
      </section>

  


@endsection