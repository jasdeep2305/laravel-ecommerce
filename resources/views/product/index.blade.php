@extends('layouts.app')
@section('content')
    <ul class="list-group">

        @foreach($products as $product)

            <li class="list-group-item">
                <a href="/products/{{$product->id}}" > <label>Title: </label> {{$product->title}} <br></a>
                <label> Description: </label> {{$product->description}} <br>
                <label>Price: </label> {{$product->price}}


                <form method="POST" action="/cartproducts">

                {{csrf_field()}}

                    <input type="hidden" name="product_id" value="{{$product->id}}">

                    <label>Quantity: </label> <input type="number" name="quantity" value="1"><br>
                    <input type="hidden" name="totalprice" value="100">
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                    {{-- By Divya--}}

                    {{--<div class="form-group">--}}
                        {{--<button type="submit" class="btn btn-primary">Buy Now</button>--}}
                    {{--</div>--}}
                </form>

            </li>

        @endforeach</ul>
@stop
