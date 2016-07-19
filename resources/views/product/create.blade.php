@extends('layouts.app')
@section('content')

    @include('common.form_errors')
    <div class="container">
        {{--@include('common.form_errors')--}}
        @include('product.form.create')
    </div>
@stop