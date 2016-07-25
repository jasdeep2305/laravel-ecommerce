@extends('layouts.app')
@section('content')
    <ul class="list-group">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" ALIGN="CENTER"><h3>{{$product->title}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row"> 
                                <div class="col-md-4">  <label>Product Title : </label></div> 
                                <div class="col-md-6">  {{$product->title}}</div>
                             </div>
                            <div class="row"> 
                                <div class="col-md-4">  <label>Product Description : </label></div> 
                                <div class="col-md-6">  {{$product->description}}</div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-4">  <label>Seller : </label></div> 
                                <div class="col-md-6">  {{$product->seller_name}}</div>
                            </div>

                            <div class="row"> 
                                <div class="col-md-4">  <label>Product Price : </label></div> 
                                <div class="col-md-6">  {{$product->price}}</div>
                            </div>
                            @include('product.form.show')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
@stop