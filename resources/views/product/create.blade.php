@extends('layouts.app')
@section('content')

    @include('common.form_errors')
    <div class="container">
    {{--<form method="POST" action="{{url('/products')}}">--}}

        {{--{{csrf_field()}}--}}

        {{--<label>Product Title : </label><br> <input type="text" name="product_title" value="" required><br>--}}
        {{--<label>Product Description : </label><br><input type="text" name="product_description" value="" required><br>--}}
        {{--<label>Seller Name : </label><br><input type="text" name="product_sellername" value="" required><br>--}}
        {{--<label>Seller Id : </label><br><input type="number" name="product_sellerid" value="" required><br>--}}
        {{--<label>Product Price : </label><br><input type="number" name="product_price" value="" required><br>--}}

        {{--<div class="form-group">--}}
           {{--<br> <button type="submit" class="btn btn-primary">Add Product</button>--}}

        {{--</div>--}}

    {{--</form>--}}
    @include('product.form.create')



    </div>
@stop