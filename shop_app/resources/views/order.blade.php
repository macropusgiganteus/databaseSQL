@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')

<body>
            <section id="gigs" class="container">
                    <h1>Order</h1>
                    <br><br>
                    
                    @foreach($data as $value)
                        <div class="gig" >
                            <div>
                                    <center>   <h2>OrderID : # {{$value->orderNumber}} </h2> </center>
                                    <h3>Order Date : {{$value->orderDate}} </h3>
                                    <ul>
                                        <li>Required Date : {{$value->requiredDate}}<br></li>
                                        <li>Shipped Date : {{$value->shippedDate}}<br></li>
                                        <li>Staus : {{$value->status}}<br></li>
                                    </ul>
                                    <div class="tech">
                                        <small>Comment : <span> {{$value->comments}} <br>
                                        </span> CustomerID : <span> #{{$value->customerNumber}}</span></small>
                                    </div><br>
                            </div>
                        </div><br>
                    @endforeach
            </section>
</body>

@endsection

  
