@extends('layouts.app')
@section('content')
    <ul class="list-group">

        <div class="container">
            <div class="form-group">
                <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center"><h3>Products</h3></div>
                        <div class="panel-body">
                            @can('view-order', $order)
                                @foreach($order->products as $product)

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-3"><label>Product ID:</label></div>
                                            <div class="col-lg-6"> {{$product->id}} </div>
                                            <br>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-3"><label>Product Description:</label></div>
                                            <div class="col-lg-6">{{$product->description}}</div>
                                            </div>
                                       --------------------------------------------------------------------------------------
                                        <div class="row">
                                        <div class="visible-lg-inline-block col-lg-3" >
                                            <span class="small">Seller Name:{{$product->seller_name}}</span>
                                        </div>
                                        <div class="visible-lg col-lg-9">
                                            <span class="small" > Order on: {{$order->placed_on}}</span>
                                        </div>
                                        </div>

                                    </li>

                                @endforeach
                            @endcan


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </ul>
@stop