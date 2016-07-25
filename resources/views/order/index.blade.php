@extends('layouts.app')
@section('content')
    <ul class="list-group">
        <div class="container">
            <div class="form-group" >
                <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                       <div class="panel-heading"><h3>Your Orders</h3></div>

                        <div class="panel-body">


                            <h4>Total Items ordered: {{count($orders)}} </h4><br>
                            @foreach($orders as $order)
                                <li class="list-group-item">
                                    <div class="container">
                                        <div class="row">
                                            <button type="button" class="btn btn-lg btn-blue">
                                                <a href={{url('/orders/'.$order->id)}}> OD {{$order->id}} </a>
                                            </button>
                                        </div>
                                    </div>

                        <br>

                                    <div class="row">
                                        <div class="col-lg-4">
                                           <label> Order Placed on:</label>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$order->placed_on}}
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-lg-4">
                                            <label>Total Price: </label>
                                        </div>
                                        <div class="col-lg-6">
                                                {{$order->bill_amount}}
                                        </div>
                                        </div>

                                    <br>
                            @include('order.form.payment')


                            @endforeach
                        </div>

                        <div class="container">
                            {{$orders->links()}}
                        {{--<div class="row">--}}

                            {{--<div class="col-lg-6">--}}
                                {{--<label><a href="{{url('/products')}}">Continue Shopping</a> </label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                            </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </ul>
@stop