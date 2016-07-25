@extends('layouts.app')
@section('content')

    @include('common.form_errors')
    <div class="container">
        <div class="panel panel-default">
           <div class="panel-heading" ALIGN="CENTER">
               <h3>Add a New Product</h3>
           </div>
        </div>

        @include('product.form.create')
    </div>
@stop