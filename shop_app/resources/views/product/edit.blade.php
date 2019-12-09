@extends('layouts.AllLayout')
@section('title','SHOP')
@section('content')
<section id="add" class="container">
    <div class="form-wrap">
      <h1>Edit</h1>
      
      <form action="{{action('ProductsController@update', $productCode)}}" method="POST">
        {{csrf_field()}}
        <div class="input-group">
          <label for="title">ProductCode</label>
          <input type="text" name="productCodeshow" id="productCode" disabled="disabled" class="input-box" placeholder=""
            maxlength="50" value="{{$product->productCode}}">
            <input type="hidden" name="productCode" value="{{$product->productCode}}" />
        </div>
        <div class="input-group">
          <label for="technologies">Name</label>
          <input type="text" name="productName" id="technologies" class="input-box" placeholder=""
          maxlength="50" value="{{$product->productName}}">
        </div>
        <div class="input-group">
          <label for="technologies">Product Line</label>
          <input type="text" name="productLine" id="technologies" disabled="disabled" class="input-box" placeholder=""
          maxlength="50" value="{{$product->productLine}}">
        </div>
        <div class="input-group">
          <label for="budget">Product Scale</label>
          <input type="text" name="productScale" id="budget" class="input-box" disabled="disabled" placeholder="X:X" value="{{$product->productScale}}">
        </div>
        <div class="input-group">
          <label for="budget">Product Vendor</label>
          <input type="text" name="productVendor" id="budget" class="input-box" placeholder="" value="{{$product->productVendor}}" >
        </div>
        <div class="input-group">
          <label for="budget">Description</label>
          <input type="text"  name="productDescription" id="budget" disabled="disabled" class="input-box" placeholder="" value="{{$product->productDescription}}">
        </div>
        <div class="input-group">
          <label for="budget">Amount</label>
          <input type="number"  name="quantityInStock" id="budget" disabled="disabled" class="input-box" placeholder="" value="{{$product->quantityInStock}}">
        </div>
        <div class="input-group">
            <label for="budget">Price</label>
            <input type="number" step="0.01" name="buyPrice" id="budget" disabled="disabled" class="input-box" placeholder="" value="{{$product->buyPrice}}">
          </div>
        <div class="input-group">
            <label for="budget">MSRP</label>
            <input type="number" step="0.01" name="MSRP" id="budget" disabled="disabled" class="input-box" placeholder="" value="{{$product->MSRP}}">
          </div>
          <input type="submit" value="Update" class="btn btn-reverse">
          <input type="hidden" name="_method" value="PATCH" />
      </form>
    </div>
  </section>

@endsection