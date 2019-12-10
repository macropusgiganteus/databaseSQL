@extends('layouts.Layout_Sales')
@section ('title','SHOP')
@section('content')
<div class="container">
    <h1>Stock In</h1>
    <button class="btn btn-reverse"><a href="/stock/create">Add</a></button>
</div>
<section id="gigs" class="container">
    <table class="table table-bordered table-striped">
        <tr>
            <th>ProductID</th>
            <th>Amount</th>
            <th>Time Created</th>
            <th>Time updated</th>
            {{-- <th>Edit</th> --}}
            <th>Delete</th>
        </tr>
        @foreach($stock as $row)
        <tr>
            <td>{{$row['productID']}}</td>
            <td>{{$row['amount']}}</td>
            <td>{{$row['created_at']}}</td>
            <td>{{$row['updated_at']}}</td>
            {{-- <td><a href="{{action('StockInController@edit', $row['id'])}}" class="btn btn-primary">Edit</a></td> --}}
            <td>
            <form method="post" class="delete_form" action="{{action('StockInController@destroy', $row['id'])}}">
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