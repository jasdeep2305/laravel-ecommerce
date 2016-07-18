
@extends('layouts.app')
@section('content')
    <ul class="list-group">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Products</div>

                        <div class="panel-body">
                            @foreach($order->products as $product)

                                <li class="list-group-item">
                                    Product ID: {{$product->id}} <br>
                                    Product Description: {{$product->description}}
                                    Seller Name: {{$product->seller_name}}
                                </li>

                            @endforeach
                                <div class="form-group" >
                                    <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </ul>
@stop