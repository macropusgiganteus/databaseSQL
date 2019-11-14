@extends('layouts.AllLayout')
@section ('title','CustomerID')
@section('content')

<section id="add" class="container">
  <div class="gig">
    <body>
      <center>
        <h1>CustomersID</h1>
        <div class="container">
          <div class="input-group">
            <form action="/login_customer" method="post">  
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="text" name="customerID" id="title" class="input-box" placeholder="Please enter your customer number">
              <div align="right">
                  <input type="submit" name="submit" class="btn btn-reverse" value="SUBMIT">
              </div>   
            </form>     
          </div>
        </div>
        <br><br>
        </center>      
    </body>

  </div>
  </section>

@endsection

  
