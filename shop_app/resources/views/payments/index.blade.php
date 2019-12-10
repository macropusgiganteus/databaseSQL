@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','SHOP')
@section('content')
<div class="container">
    <h1>Payments History</h1>
    <button class="btn btn-reverse"><a href="/payments/create">Add</a></button>
</div>
<section id="gigs" class="container">
    <table class="table table-bordered table-striped">
        <tr>
            <th>customerNumber</th>
            <th>checkNumber</th>
            <th>paymentDate</th>
            <th>amount</th>
            {{-- <th>Edit</th> --}}
            {{-- <th>Delete</th> --}}
        </tr>
        @foreach($payments as $row)
        <tr>
            <td>{{$row['customerNumber']}}</td>
            <td>{{$row['checkNumber']}}</td>
            <td>{{$row['paymentDate']}}</td>
            <td>{{$row['amount']}}</td>
            {{-- <td><a href="{{action('StockInController@edit', $row['id'])}}" class="btn btn-primary">Edit</a></td> --}}
            {{-- <td>
            <form method="post" class="delete_form" action="{{action('PaymentsController@', $row['checkNumber'])}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>--}}
        </tr>   
        @endforeach
    </table>
</section>

@endsection