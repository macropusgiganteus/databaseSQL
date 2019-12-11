@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section ('title','SHOP')
@section('content')

<section id="gigs" >
    <h1 class="container">Employees</h1>
    <div class="container">
        <a href="/employees/add" class="btn btn-reverse">Add an employee</a>
    </div>
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
        <th>Edit</th>
        <th>Delete</th>
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
      <td>
        <select name="jobTitle" id="jobTitle" class="form-control vendor">
            <option value="">{{$employee['jobTitle']}}</option>
            <option value="President">President</option>
            <option value="VP Sales">VP Sales</option>
            <option value="VP Marketing">VP Marketing</option>
            <option value="Sales Manager (APAC)">Sales Manager (APAC)</option>
            <option value="Sale Manager (EMEA)">Sale Manager (EMEA)</option>
            <option value="Sales Manager (NA)">Sales Manager (NA)</option>
            <option value="Sales Rep">Sales Rep</option>
        </select>
      </td>
      <td><a href="{{action('EmployeesController@edit', $employee['employeeNumber'])}}" class="btn btn-primary">Edit</a></td>
      <td>
      <form method="post" class="delete_form" action="{{action('EmployeesController@destroy', $employee['employeeNumber'])}}">
      {{csrf_field()}}
      {{ method_field('DELETE') }} 
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      </td>
  </tr>  
  @endforeach
</table>
  </section>

@endsection

  
