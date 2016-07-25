@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading" ALIGN="CENTER">
                <h3>{{$product->title}}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <li class="list-group-item">

                    <div class="row"> 
                        <div class="col-md-4">  
                            <label>Product Title : </label>
                        </div> 
                        <div class="col-md-6">  
                            {{$product->title}}
                        </div>
                     </div>

                    <div class="row"> 
                        <div class="col-md-4">  
                            <label>Product Description : </label>
                        </div> 
                        <div class="col-md-6">  
                            {{$product->description}}
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-md-4">  
                            <label>Seller : </label>
                        </div> 
                        <div class="col-md-6">  
                            {{$product->seller_name}}
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-md-4">  
                            <label>Product Price : </label>
                        </div> 
                        <div class="col-md-6">  
                            {{$product->price}}
                        </div>
                    </div>
                    @include('product.form.show')
                </li>
            </div>
        </div>
    </div>
@stop