@extends('layouts.app')
@section('content')

    @include('common.form_errors')
    <div class="container">
        <h3 align="center">Add a New Product Page</h3>
        {{--@include('common.form_errors')--}}
        @include('product.form.create')
    </div>
@stop