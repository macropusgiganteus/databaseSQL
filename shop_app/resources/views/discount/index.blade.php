@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','SHOP')
@section('content')

{{-- alert --}}
<section class="container">
    @if(\Session::has('success'))
    <div class="w3-panel w3-green " align="center">
    <p>{{\Session::get('success')}}</p>
    </div>
    @endif

</section>

<div class="container">
    <h1>Promotion : Discount </h1>
    @if(stripos(Cookie::get('jobtitle')  , 'Market'))
    <button class="btn btn-reverse"><a href="/discount/create">Add Discount Code</a></button>
    @endif
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
                <td>{{$row['Create_date']}}</td>
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
