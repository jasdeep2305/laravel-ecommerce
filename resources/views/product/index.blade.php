@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" ALIGN="CENTER">
                <h3>All Products</h3>
            </div>
        </div>

    @include('product.form.index')
        {{$products->links()}}
    </div>
@stop
