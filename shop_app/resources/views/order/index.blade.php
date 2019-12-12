@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','Payment')
@section('content')

<section>
    <h1 class="container">Orders</h1>
    <div class="container">
            @if(Cookie::get('jobtitle'))
            <a href="/orders/calpoint" onclick="" class="btn btn-reverse ">Update point</a>
            @endif
    </div>
    <br>
    <table  class="table table-bordered table-striped">
        <tr>
            <th>orderNumber</th>
            <th>orderDate</th>
            <th>requiredDate</th>
            <th>shippedDate</th>
            <th>status</th>
            <th>comments</th>
            <th>customerNumber</th>
            <th>Earn Point</th>
            @if(Cookie::get('jobtitle'))
            <th>update</th>
            @endif
        </tr>

        @foreach ($orders as $order)
        <tr>
            <td>{{$order['orderNumber']}}</td>
            <td>{{$order['orderDate']}}</td>
            <td>{{$order['requiredDate']}}</td>
            <form method="post"  action="{{action('OrdersController@status')}}">
            <td><input name="shippedDate" type="date" value ="{{$order['shippedDate']}}" 
                @if(Cookie::get('jobtitle') ==false)
                disabled="disable"
                @endif></td>
            <td >
                <select name="status" id="status" class="form-control vendor"
                @if(Cookie::get('jobtitle') ==false)
                disabled="disable"
                @endif>
                <option value="{{$order['status']}}">{{$order['status']}}</option>
                <option value="resolved">resolved</option>
                <option value="on hold">on hold</option>
                <option value="in process">in process</option>
                <option value="disputed">disputed</option>
                <option value="cancelled">cancelled</option>
                </select>
            </td>
            <td><input name="comments" type="text" value ="{{$order['comments']}}"
                @if(Cookie::get('jobtitle')== false)
                disabled="disable"
                @endif></td>
            <td>{{$order['customerNumber']}}</td>
            <td>{{$order['point']}}</td>
            @if(Cookie::get('jobtitle'))
            <td>
                    {{csrf_field()}}
                    <input type="hidden" name="orderNumber" value="{{$order['orderNumber']}}"/>
                    <button type="submit" class="btn btn-primary">OK</button>
            </td>
            @endif
            </form>
        </tr>
        @endforeach
    </table>
    

</section>
@endsection
