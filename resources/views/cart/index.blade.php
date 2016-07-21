@extends('layouts.app')
@section('content')
    <ul class="list-group">
    <div class="container">

        <div class="form-group" >
            <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
        </div>

        <h3 align="center">Your Cart contains {{count($cart->products)}} products</h3>

    @foreach($cart->products as $product)

        <li class="list-group-item">
            {{--<label> Product id :</label> <a href="/products/{{$product->id}}" >{{$product->id}}<br></a>--}}
            <label> Product id :</label> <a href="{{url('/products/'.$product->id)}}">{{$product->id}}<br></a>
            <label>Product Title:</label> {{$product-> title}} <br>
            <label> Product quantity:</label> {{$product->pivot->quantity}}<br>
            <label>Product Price: </label>{{$product->pivot->totalprice}}<br>

            @include('cart.form.index')

        </li>
    @endforeach
    </div>
                    </ul>

@endsection

