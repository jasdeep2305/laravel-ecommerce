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

        </li>

    @endforeach</ul>
@stop

