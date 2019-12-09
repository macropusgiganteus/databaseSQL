@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')
  <section id="add" class="container">
  <div class="gig">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{action('UsersController@login')}}" method="POST">
      {{csrf_field()}}
      <div class="input-group">
        <label for="title">Employee Number</label>
        <input type="text" name="employeenumber" id="productCode" class="input-box" placeholder=""
          maxlength="50" >
      </div>
      <div class="input-group">
        <label for="technologies">Password</label>
        <input type="text" name="password" id="technologies" class="input-box" placeholder=""
        maxlength="50" >
      </div>
      
      <input type="submit" value="Log in" class="btn btn-reverse">
      <a href="/users/register" class="btn btn-reverse">Register</a>
    </form>
</section>
</body>

</html>
@endsection