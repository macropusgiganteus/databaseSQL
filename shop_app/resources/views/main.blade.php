@extends('layouts.mainLayout')

@section('content')
<section id="search" class="search-wrap">
  <!-- <h1>Find A Product</h1> -->
  <form action="/products/search" class="search-form">
    <i class="fas fa-search"></i>
    <input type="search" name="term" placeholder="Enter a product name...">
    <input type="submit" value="Search">
  </form>
</section>
@endsection
    


