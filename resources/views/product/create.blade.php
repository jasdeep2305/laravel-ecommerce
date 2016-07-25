@extends('layouts.app')
@section('content')

    @include('common.form_errors')
    <ul class="list-group">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                     <div class="panel panel-default">
                            <div class="panel-heading" ALIGN="CENTER"><h3>Add a New Product</h3></div>
                            <div class="panel-body">
                             @include('product.form.create')
                            </div>
                     </div>
                </div>
            </div>
        </div>
    </ul>
@stop