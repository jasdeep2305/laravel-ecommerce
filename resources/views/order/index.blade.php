@extends('layouts.app')
@section('content')
    <ul class="list-group">
        <div class="container">
            <div class="form-group">
                <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
            </div>
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading" ALIGN="CENTER">
                        <h3>Categories</h3>
                    </div>
                </div>
                @include('product.product_list_categories')
            </div>

            {{--Orders --}}
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" align="center">
                                <h3>Your Orders</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @foreach($orders as $order)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4>Order Id:</h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4><a href={{url('/orders/'.$order->id)}}>{{$order->id}}</a></h4>
                                    </div>
                                </div>
                                {{--<hr style="height:1px;border:none;color:#333;background-color:#333;" />--}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Order Placed on:</label>
                                    </div>
                                    <div class="col-lg-6">
                                        {{$order->placed_on}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Order Delivered on:</label>
                                    </div>
                                    <div class="col-lg-6">
                                        {{$order->delivered_on}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Total Price: </label>
                                    </div>
                                    <div class="col-lg-6">
                                        {{$order->bill_amount}}
                                    </div>
                                </div>
                                {{--@include('order.Payment')--}}
                            </li>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
     </div>
        {{$orders->links()}}
    </ul>
@stop