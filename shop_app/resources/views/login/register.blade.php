@extends('layouts.Layout')
@section ('title','SHOP')
@section('content')

  <section id="add" class="container">
  <div class="gig">
    <form action="{{action('UsersController@create')}}" method="POST">
      {{csrf_field()}}
      <div class="input-group">
        <label for="title">Employee Number</label>
        <input type="number" name="employeenumber" id="employeenumber" class="input-box" placeholder=""
          maxlength="50" >
      </div>
      <div class="input-group">
        <label for="technologies">Password</label>
        <input type="text" name="password" id="password" class="input-box" placeholder=""
        maxlength="50" >
      </div>
      
      <input type="submit" value="Register" class="btn btn-reverse">
    </form>
</section>
</body>

</html>
@endsection