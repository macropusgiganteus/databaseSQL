@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','SHOP')
@section('content')
<div class="container">
    <h1>Promotion : Buy 1 Get 1 </h1>
    <button class="btn btn-reverse"><a href="/buy1get1/create">Add Product</a></button>
</div>
<section id="gigs" class="container">
    <table class="table table-bordered table-striped">
        <tr>
            <th>ProductID</th>
            <th>Time Created</th>
            <th>Expiry Time</th>
            {{-- <th>Edit</th> --}}
            <th>Delete</th>
        </tr>
        @foreach($products as $row)
        <tr>
            <td>{{$row['ProductCode']}}</td>
            <td>{{$row['created_at']}}</td>
            <td>{{$row['EXP_date']}}</td>
            {{-- <td><a href="{{action('StockInController@edit', $row['id'])}}" class="btn btn-primary">Edit</a></td> --}}
            <td>
            <form method="post" class="delete_form" action="{{action('Buy1get1controller@destroy', $row['id'])}}">
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