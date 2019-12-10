@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','Cart')
@section('content')
<div class="container">
    <h1>Cart</h1>
    <button class="btn btn-reverse"><a href="/stock/create">Add</a></button>
</div>
<section id="gigs" class="container">
    <table class="table table-bordered table-striped">
        <tr>
            <th>CustomerID</th>
            <th>ProductID</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Delete</th>
        </tr>
        @foreach($carts as $item)
        <tr>
            <td>{{$item['customerNumber']}}</td>
            <td>{{$item['productCode']}}</td>
            <td>{{$item['priceEach']}}</td>
            <td>{{$item['quantityOrdered']}}</td>
            {{-- <td><a href="{{action('CartController@edit', $item['id'])}}" class="btn btn-primary">Edit</a></td> --}}
            <td>
            {{-- <form method="post" class="delete_form" action="{{action('CartController@destroy', $item['id'])}}"> --}}
            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>  
        @endforeach
    </table>
</section>

@endsection