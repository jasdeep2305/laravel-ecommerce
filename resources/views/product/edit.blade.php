@extends('layouts.app')
@section('content')

    <div class="container">

        <h1 align="center">Edit {{$product->title}}</h1>
        @include('product.form.edit')
    </div>
@stop