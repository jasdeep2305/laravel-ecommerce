@extends('layouts.app')
@section('content')
    <ul class="list-group">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" ALIGN="CENTER"><h3>Edit "{{$product->title}}"</h3></div>
                        <div class="panel-body">
                            @include('product.form.edit')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
@stop