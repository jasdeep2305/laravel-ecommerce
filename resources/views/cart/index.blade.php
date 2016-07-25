@extends('layouts.app')
@section('content')

    <div class="container">
    <ul class="list-group">
        <div class="form-group" >
            <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" ALIGN="CENTER">
                <h3>Your Cart contains {{count($cart->products)}} products</h3>
            </div>
        </div>

    @foreach($cart->products as $product)

        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    <label> Product id :</label>
                </div>
                <div class="col-md-6">
                    <a href="{{url('/products/'.$product->id)}}">{{$product->id}}</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>Product Title:</label>
                </div>
                <div class="col-md-6">
                    {{$product-> title}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label> Product quantity:</label>
                </div>
                <div class="col-md-6">
                    {{$product->pivot->quantity}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>Product Price: </label>
                </div>
                <div class="col-md-6">
                    {{$product->pivot->totalprice}}
                </div>
            </div>

            @include('cart.form.index')
        </li>
    @endforeach

    </ul>

    </div>

@endsection

