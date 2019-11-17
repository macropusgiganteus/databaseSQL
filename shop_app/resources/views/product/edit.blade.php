@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')

<section id="add" class="container">
        
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
