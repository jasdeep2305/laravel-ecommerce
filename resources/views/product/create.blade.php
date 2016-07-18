@extends('layouts.app')
@section('content')

    <div class="container">
        @include('common.form_errors')
    <form method="POST" action="{{url('/products')}}">

        {{csrf_field()}}

        <label>Product Title : </label><br> <input type="text" name="product_title"><br>
        <label>Product Description : </label><br><input type="text" name="product_description" ><br>
        <label>Seller Name : </label><br><input type="text" name="product_sellername" ><br>
        <label>Seller Id : </label><br><input type="number" name="product_sellerid" ><br>
        <label>Product Price : </label><br><input type="number" name="product_price"><br>

        <div class="form-group">
           <br> <button type="submit" class="btn btn-primary">Add Product</button>

        </div>

    </form>
    </div>
@stop