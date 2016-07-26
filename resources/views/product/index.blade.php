@extends('layouts.app')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <ul class="list-group">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" ALIGN="CENTER"><h3>All Products</h3></div>
                            <div class="panel-body">
                                @include('product.form.index')
                            </div>
                        </div>
                        {{$products->links()}}
                </div>
            </div>
        </div>
    </ul>
@stop
