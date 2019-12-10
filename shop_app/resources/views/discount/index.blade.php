@extends('layouts.AllLayout')
@section ('title','SHOP')
@section('content')

<div class="container">
    <h1>Promotion : 50%discount </h1>
    <button class="btn btn-reverse"><a href="/discount/create">Add Discount Code</a></button>
</div>
<section id="gigs" class="container">
        <table class="table table-bordered table-striped">
            <tr>
                <th>ProductCode</th>
                <th>Count</th>
                <th>Time Created</th>
                <th>Expiry Time</th>
                {{-- <th>Edit</th> --}}
                <th>Delete</th>
            </tr>
            @foreach($promotion as $row)
            <tr>
                <td>{{$row['PromotionCode']}}</td>
                <td>{{$row['Count']}}</td>
                <td>{{$row['created_at']}}</td>
                <td>{{$row['EXP_date']}}</td>
                {{-- <td><a href="{{action('StockInController@edit', $row['id'])}}" class="btn btn-primary">Edit</a></td> --}}
                <td>
                <form method="post" class="delete_form" action="{{action('DiscountController@destroy', $row['id'])}}">
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
