@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','SHOP')
@section('content')

<section id="add" class="container">
        <div class="form-wrap">
          <h1>Promotions Buy1Get1</h1>
          <p>this promotion will start after you added.</p>
  
              
          
          {{-- form --}}
          <form action="{{url('buy1get1')}}" method="POST">
            {{csrf_field()}}
            <div class="input-group">
              <label for="ProductID">Product Code</label>
              <input type="text" name="productCode" id="productCode" class="input-box" placeholder="Add product to this promotion."
                maxlength="50" >
            </div>
            <div class="input-group">
              <label for="amount">Expiry Date</label>
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
    @if(\Session::has('error'))
    <div class="w3-panel w3-red" align="center">
    <p>{{\Session::get('error')}}</p>
    </div>
    @endif

</section>

@endsection
