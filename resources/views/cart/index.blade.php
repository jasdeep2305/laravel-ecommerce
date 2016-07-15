@extends('layouts.app')
@section('content')
<div class="container">

        <h3 align="center">Your Cart contains {{count($cart->products)}} products</h3>
</div>

<ul class="list-group">

    @foreach($cart->products as $product)

        <li class="list-group-item">
            {{--<label> Product id :</label> <a href="/products/{{$product->id}}" >{{$product->id}}<br></a>--}}
            <label> Product id :</label> <a href="{{url('/products/'.$product->id)}}">{{$product->id}}<br></a>
            <label>Product Title:</label> {{$product-> title}} <br>
            <label> Product quantity:</label> {{$product->pivot->quantity}}<br>
            <label>Product Price: </label>{{$product->pivot->totalprice}}<br>


        <form method="POST" action="/cartproducts/{{$product->id}}">
            {{method_field('DELETE')}}
            {{csrf_field()}}

            <input type="hidden" name="product_id" value="{{$product->id}}">

            <input type="hidden" name="cart_id" value="{{$cart->id}}">

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Remove from Cart</button>
            </div>
        </form>

            <form method="POST" action="/cartproducts/{{$product->id}}">
                {{method_field('PATCH')}}
                {{csrf_field()}}

                <input type="hidden" name="product_id" value="{{$product->id}}">

                <input type="hidden" name="cart_id" value="{{$cart->id}}">
                <label>New Quantity:  </label><input type="number" name="updated_quantity" value="" required><br>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Quantity</button>
                </div>
            </form>

            {{--<form method="POST" action="/cartproducts/{{$product->id}}">--}}

                {{--{{csrf_field()}}--}}

                {{--<input type="hidden" name="product_id" value="{{$product->id}}"><br>--}}

                {{--<div class="form-group" align="top-right">--}}
                    {{--<button type="submit" class="btn btn-primary">Buy Now</button>--}}
                {{--</div>--}}
            {{--</form>--}}

            <form method="POST" action="/orders/confirmation">

                {{csrf_field()}}
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="totalprice" value="{{$product->price}}">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buy Now</button>
                </div>
            </form>
        </li>
    @endforeach</ul>

@stop

