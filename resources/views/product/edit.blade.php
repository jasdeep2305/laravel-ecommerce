@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" ALIGN="CENTER">
                <h3>Edit "{{$product->title}}"</h3>
            </div>
        </div>
        @include('product.form.edit')
    </div>
@stop