@extends('layouts.app')
@section('content')

    <h1 align="center">All Products</h1>
    <ul class="list-group">

        @foreach($products as $product)

            <li class="list-group-item">
                <a href={{url('/products/'.$product->id)}} > <label>Product Title: </label> {{$product->title}} <br></a>
                <label>Description: </label> {{$product->description}} <br>
                <label>Price: </label> {{$product->price}}


                <form method="POST" action={{url('/cartproducts')}}>

                {{csrf_field()}}

                    <input type="hidden" name="product_id" value="{{$product->id}}">

                    <label>Quantity: </label> <input type="number" name="quantity" value="1"><br>
                    <input type="hidden" name="totalprice" value="100">
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>



                </form>

                {{-- By Divya--}}
                <form method="POST" action={{url('/orders/confirmation')}}>

                    {{csrf_field()}}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="totalprice" value="100">
                    <input type="hidden" name="description" value="{{$product->description}}">
                    <input type="hidden" name="title" value="{{$product->title}}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Buy Now</button>
                    </div>
                </form>

            </li>

        @endforeach</ul>
@stop
