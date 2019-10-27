@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')
  <section id="add" class="container">
  <div class="gig">
    <h2>Employee Number</h2>
    <div class="input-group">
      <input type="text" name="title" id="title" class="input-box" placeholder="Please enter your employee number"
        maxlength="50">
    </div>
    <h2>Password</h2>
    <div class="input-group">
      <input type="text" name="title" id="title" class="input-box" placeholder="Please enter your password"
        maxlength="50">
    </div>
    <div>
      <br><a href="/main" class="btn btn-reverse">Login</a>
    </div>
    <br>
  </div>
</section>
</body>

</html>
@endsection