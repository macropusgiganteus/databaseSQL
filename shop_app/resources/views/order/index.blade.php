@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','Payment')
@section('content')

<section>
    <h1 class="container">Orders</h1>
    <br><br>
    <table class="table table-bordered table-striped">
        <tr>
            <th>orderNumber</th>
            <th>orderDate</th>
            <th>requiredDate</th>
            <th>shippedDate</th>
            <th>status</th>
            <th>comments</th>
            <th>customerNumber</th>
        </tr>

        @foreach ($orders as $order)
        <tr>
            <td>{{$order['orderNumber']}}</td>
            <td>{{$order['orderDate']}}</td>
            <td>{{$order['requiredDate']}}</td>
            <td>{{$order['shippedDate']}}</td>
            <td>{{$order['status']}}</td>
            <td>{{$order['comments']}}</td>
            <td>{{$order['customerNumber']}}</td>
        </tr>
        @endforeach
    </table>

</section>
@endsection
