@extends('layout')
@section('content')
    <ul class="list-group">

        @foreach($products as $product)

            <li class="list-group-item">
                {{$product->title}} <br>
                {{$product->description}} <br>
                Price: {{$product->price}}

            </li>

        @endforeach</ul>
@stop
