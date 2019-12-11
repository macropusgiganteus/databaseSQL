@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','Payment')
@section('content')

<section>
    <h1 class="container">Orders</h1>
    <br><br>
    <table  class="table table-bordered table-striped">
        <tr>
            <th>orderNumber</th>
            <th>orderDate</th>
            <th>requiredDate</th>
            <th>shippedDate</th>
            <th>status</th>
            <th>comments</th>
            <th>customerNumber</th>
            <th>update</th>
        </tr>

        @foreach ($orders as $order)
        <tr>
            <td>{{$order['orderNumber']}}</td>
            <td>{{$order['orderDate']}}</td>
            <td>{{$order['requiredDate']}}</td>
            <form method="post"  action="{{action('OrdersController@status')}}">
            <td><input name="shippedDate" type="date" value ="{{$order['shippedDate']}}"></td>
            <td >
                <select name="status" id="status" class="form-control vendor">
                <option value="{{$order['status']}}">{{$order['status']}}</option>
                <option value="resolved">resolved</option>
                <option value="on hold">on hold</option>
                <option value="in process">in process</option>
                <option value="disputed">disputed</option>
                <option value="cancelled">cancelled</option>
                </select>
            </td>
            <td><input name="comments" type="text" value ="{{$order['comments']}}"></td>
            <td>{{$order['customerNumber']}}</td>
            <td>
                    {{csrf_field()}}
                    <input type="hidden" name="orderNumber" value="{{$order['orderNumber']}}"/>
                    <button type="submit" class="btn btn-primary">OK</button>
            </td>
            </form>
        </tr>
        @endforeach
    </table>

</section>
@endsection
