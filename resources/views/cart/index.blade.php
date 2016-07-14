@extends('layouts.app')
@section('content')
<div class="container">

        <h3 align="center">Your Cart contains {{count($cart->products)}} products</h3>
</div>

</div>

<ul class="list-group">

    @foreach($cart->products as $product)

        <li class="list-group-item">
            <label> Product id :</label> <a href="/products/{{$product->id}}" >{{$product->id}}<br></a>
            <label> Product quantity:</label> {{$product->pivot->quantity}}<br>
            <label>Product Price: </label>{{$product->pivot->totalprice}}<br>
            <label>Product Title:</label> {{$product-> title}} <br>

        <form method="POST" action="/cartproducts/{{$product->id}}">
            {{method_field('DELETE')}}
            {{csrf_field()}}

            {{--<input type="hidden" name="_method" value="DELETE">--}}

            <input type="hidden" name="product_id" value="{{$product->id}}">

            <input type="hidden" name="cart_id" value="{{$cart->id}}">

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Remove from Cart</button>
            </div>
        </form>
        </li>
    @endforeach</ul>

@stop

