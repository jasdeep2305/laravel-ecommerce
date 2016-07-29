@extends('layouts.app')
@section('content')
    <div class="container">

        {{--<div class="col-md-3 col-sm-3"></div>--}}
        <div class="col-md-12 col-sm-12">
            {{--<ul class="list-group">--}}
            <div class="form-group">
                <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 ALIGN="CENTER">Logged in as {{Auth::user()->email}}
                                {{--<span class="cart-product-counter"--}}
                                {{--data-count="{{count($cart->products)}}">{{count($cart->products)}}</span>--}}
                                {{--products--}}
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-3">

                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <label> <a href="{{ url('/login') }}">Change Login</a></label>
                        </div>

                    </div>
                </div>
            </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> Order Summary</h4>
                    </div>
                </div>

            <table class="table table-bordered">
                <tr>
                    <td>
                        <label>Product ID:</label>
                    </td>
                    <td>
                        <label>Product title:</label>
                    </td>
                    <td>
                        <label>Product Description:</label>
                    </td>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                        <label>Total price:</label>
                    </td>
                </tr>
                @foreach($cart->products as $product)
                    <tr>

                        <td>
                            {{$product->id}}
                        </td>
                        <td>
                            {{$product->title}}
                        </td>
                        <td>
                            {{$product->description}}
                        </td>
                        <td>
                            {{$product->pivot->quantity}}
                        </td>
                        <td>
                            {{$product->pivot->totalprice}}
                        </td>

                    </tr>
                @endforeach

            </table>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Delivery Address</h4>
                </div>
            </div>
            <div class="row">
                <label for="name" class="col-md-3 control-label">Name</label>
                <div class="col-md-9">
                    <input id="name" type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="row">
                <label for="address" class="col-md-3 control-label">Address</label>
                <div class="col-md-9">
                    <input id="address" type="text" class="form-control" name="address">
                </div>
            </div>
            <div class="row">
                <label for="pincode" class="col-md-3 control-label">Pin Code</label>
                <div class="col-md-9">
                    <input id="pincode" type="text" class="form-control" name="pincode">
                </div>
            </div>

            <button type="button" class="btn btn-default">Proceed</button>
        </div>

    </div>




@endsection