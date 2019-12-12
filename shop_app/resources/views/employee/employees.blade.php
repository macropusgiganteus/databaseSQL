@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','SHOP')
@section('content')

<section id="gigs" >
    <h1 class="container">Employees</h1>
    @if(Cookie::get('jobtitle'))
    <div class="container">
        <a href="/employees/add" class="btn btn-reverse">Add an employee</a>
    </div>
    @endif
    <br><br>
    <table class="table table-bordered table-striped">
      <tr>
        <th>employeeNumber</th>
        <th>firstName</th>
        <th>lastName</th>
        <th>email</th>
        <th>officeCode</th>
        <th>reportsTo</th>
        <th>extension</th>
        <th>jobTitle</th>
        @if(Cookie::get('jobtitle'))
        <th>Promote/Demote</th>
        <th>Delete</th>
        @endif
    </tr>
    @foreach ($employees as $employee)
    <tr>
      <td>{{$employee['employeeNumber']}}</td>
      <td>{{$employee['firstName']}}</td>
      <td>{{$employee['lastName']}}</td>
      <td>{{$employee['email']}}</td>
      <td>{{$employee['officeCode']}}</td>
      <td>{{$employee['reportsTo']}}</td>
      <td>{{$employee['extension']}}</td>
      <form method="post" class="" action="{{action('EmployeesController@promote')}}">
      <td>
        <select name="jobTitle" id="jobTitle" class="form-control vendor" 
          @if(collect($below)->contains($employee['jobTitle']) == false)
          disabled="disabled"
          @endif>
            <option value="">{{ $employee['jobTitle'] }}</option>
            @foreach($below as $assign)
            <option value="{{ $assign }}">{{ $assign }}</option>
            @endforeach
        </select>
      </td>
      @if(collect($below)->contains($employee['jobTitle']) == true)
          <td>
              
                  {{csrf_field()}}
                  <input type="hidden" name="employeeNumber" value="{{ $employee['employeeNumber'] }}" />
                  <button type="submit" class="btn btn-primary">OK</button>
                  </form>
          </td>
        {{-- <td><a href="{{action('EmployeesController@edit', $employee['employeeNumber'])}}" class="btn btn-primary">Edit</a></td> --}}
        <td>
          <form method="post" class="delete_form" action="{{action('EmployeesController@destroy', $employee['employeeNumber'])}}">
          {{csrf_field()}}
          {{ method_field('DELETE') }} 
          <input type="hidden" name="_method" value="DELETE" />
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          </td>
      @endif
      
  </tr>  
  @endforeach
</table>
  </section>

@endsection

  
