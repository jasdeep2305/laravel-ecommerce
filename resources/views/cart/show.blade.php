@extends('layouts.app')
@section('content')
<div class="container">
    <div class="content">
        <div class="title">Your Cart</div>
    </div>
    Cart id: {{$cart->id}}
</div>

<ul class="list-group">

    @foreach($cart->cart_products as $cart_product)

        <li class="list-group-item">
           Product id : <a href="/products/{{$cart_product->product_id}}" >{{$cart_product->product_id}}<br></a>
           Product quantity: {{$cart_product->quantity}}<br>
           Product Price: {{$cart_product->totalprice}}<br>

        </li>

    @endforeach</ul>
@stop

