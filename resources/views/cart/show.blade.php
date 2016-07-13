@extends('layout')
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
            {{$cart_product}}

        </li>

    @endforeach</ul>
@stop

