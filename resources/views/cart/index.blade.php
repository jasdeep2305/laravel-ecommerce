@extends('layouts.app')
@section('content')
<div class="container">
    <div class="content">
        <div class="title">Your Cart</div>
    </div>
    Cart id: {{$cart->id}}
</div>

<ul class="list-group">

    @foreach($cart->products as $product)

        <li class="list-group-item">
           Product id : <a href="/products/{{$product->id}}" >{{$product->id}}<br></a>
           Product quantity: {{$product->pivot->quantity}}<br>
           Product Price: {{$product->pivot->totalprice}}<br>



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

