@extends('layouts.AllLayout')
@section ('title','CustomerID')
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


    @if(\Session::has('unsuccess'))
    <div class="w3-panel w3-orange" align="center">
    <p>{{\Session::get('unsuccess')}}</p>
    </div>
    @endif
  </section>



<section id="add" class="container">
    <div class="gig">
      <form method="post" action={{url('checklist')}}>
        {{csrf_field()}}
        <h2>Customer number</h2>
        <div class="input-group">
          <input type="number" name="customerNumber" id="credit" class="input-box" maxlength="20">
        </div>
        <input type="submit" value="submit" class="btn btn-reverse">
      </form>
   </div>
</section>

@endsection

  
