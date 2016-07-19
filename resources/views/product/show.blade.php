@extends('layouts.app')
@section('content')

    <h1 align="center">{{$product->title}}</h1>
    {{--{{$product->details}}--}}
    <div class="content">
        <li class="list-group-item">
            <label>Title: </label> {{$product->title}}<br>
            <label>Description: </label> {{$product->description}}<br>
            <label>Seller: </label>  {{$product->seller_name}}<br>
            <label>Price: </label> {{$product->price}}<br>

            @include('product.form.show')

        </li>

    </div>
@stop