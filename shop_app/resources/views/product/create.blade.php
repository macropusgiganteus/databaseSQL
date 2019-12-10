@extends(stripos(Cookie::get('jobtitle')  , 'Sale') ? 'layouts.Layout_Sales' : 'layouts.Layout'.Cookie::get('layout')  )
@section('title','SHOP')
@section('content')
<section id="add" class="container">
    <div class="form-wrap">
      <h1>Add New Product</h1>
      
      <form action="{{url('product')}}" method="POST">
        {{csrf_field()}}
        <div class="input-group">
          <label for="title">ProductID</label>
          <input type="text" name="productCode" id="productCode" class="input-box" placeholder=""
            maxlength="50" >
        </div>
        <div class="input-group">
          <label for="technologies">Name</label>
          <input type="text" name="productName" id="technologies" class="input-box" placeholder=""
          maxlength="50" >
        </div>
        <div class="input-group">
          <label for="technologies">Product Line</label>
          <input type="text" name="productLine" id="technologies" class="input-box" placeholder=""
          maxlength="50" value=>
        </div>
        <div class="input-group">
          <label for="budget">Product Scale</label>
          <input type="text" name="productScale" id="budget" class="input-box" placeholder="X:X" >
        </div>
        <div class="input-group">
          <label for="budget">Product Vendor</label>
          <input type="text" name="productVendor" id="budget" class="input-box" placeholder="" >
        </div>
        <div class="input-group">
          <label for="budget">Description</label>
          <input type="text"  name="productDescription" id="budget" class="input-box" placeholder="">
        </div>
        <div class="input-group">
          <label for="budget">Amount</label>
          <input type="number"  name="quantityInStock" id="budget" class="input-box" placeholder="" >
        </div>
        <div class="input-group">
            <label for="budget">Price</label>
            <input type="number" step="0.01" name="buyPrice" id="budget" class="input-box" placeholder="" >
          </div>
        <div class="input-group">
            <label for="budget">MSRP</label>
            <input type="number" step="0.01" name="MSRP" id="budget" class="input-box" placeholder="" >
          </div>
        <input type="submit" value="Add New Product" class="btn btn-reverse">
      </form>
    </div>
  </section>

@endsection