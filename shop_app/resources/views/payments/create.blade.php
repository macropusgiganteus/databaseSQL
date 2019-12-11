@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','SHOP')
@section('content')

<section id="add" class="container">
        <div class="form-wrap">
          <h1>Payment</h1> 
          {{-- form --}}
          <form action="{{url('payments')}}" method="POST">
            {{csrf_field()}}
            <div class="input-group">
              <label for="ProductID">customerNumber</label>
              <input type="text" name="customerNumber" id="customerNumber" class="input-box" placeholder=""
                maxlength="50" >
            </div>
            <div class="input-group">
              <label for="amount">checkNumber</label>
              <input type="text" name="checkNumber" id="checkNumber" class="input-box" placeholder=""
              maxlength="50" >
            </div>
            <div class="input-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="input-box" placeholder=""
                maxlength="50" >
              </div>
          <input type="submit"  value="Pay" class="btn btn-reverse">
          </form>
        </div>
      </section>

    {{-- alert --}}


@endsection
