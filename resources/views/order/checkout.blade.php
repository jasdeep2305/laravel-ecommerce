@extends('layouts.app')
@section('content')
    <div class="container">

        {{--<div class="col-md-3 col-sm-3"></div>--}}
        <div class="col-md-12 col-sm-12">
            {{--<ul class="list-group">--}}
            <div class="form-group">
                <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
            </div>
            <hr style="height:2px;border:none;color:#333;background-color:#333;"/>
            <div class="row" width="50%">
                <div class="col-md-6 col-sm-6">
                    <h4 ALIGN="CENTER">Logged in as {{Auth::user()->email}}
                        {{--<span class="cart-product-counter"--}}
                        {{--data-count="{{count($cart->products)}}">{{count($cart->products)}}</span>--}}
                        {{--products--}}
                    </h4>

                </div>
                <div class="col-md-3 col-md-3">
                </div>
                <div class="col-md-3 col-sm-3">
                    <label> <a href="{{ url('/logout') }}">Change Login</a></label>
                </div>

            </div>
            <hr style="height:2px;border:none;color:#333;background-color:#333;"/>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4> Order Summary</h4>
                </div>
            </div>

            <table class="table table-stripped">
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

            <div class="row ">
                <div class="col-sm-4 col-sm-offset-9 col-xs-12">

                    <h4>Amount Payable: &nbsp; <span class="grandTotal">{{$cart->totalprice()}}</span></h4>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Delivery Address</h4>
                </div>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="name"> Name </span>
                <input type="text" class="form-control" placeholder="Enter your name here" aria-describedby="name">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="address"> Address </span>
                <input type="text" class="form-control" placeholder="Address Line 1" aria-describedby="address">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon" id="pincode"> Pin Code </span>
                <input type="text" class="form-control" placeholder="Pin Code" aria-describedby="pincode">
            </div>
            <br>


            @include('order.Payment')
        </div>

    </div>




@endsection