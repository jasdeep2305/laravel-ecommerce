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
                        <div class="panel-heading" align="center"><h3>Order details for Order Id: {{$order->id}}</h3></div>
                        <div class="panel-body">


                            @can('view-order', $order)
                                @foreach($order->products as $product)
                                    <div class="row">
                                        <div class="col-lg-4">

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label>Seller Name: </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    {{$product->seller_name}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label>Placed On: </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    {{$order->placed_on}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label>Delivered On:</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    {{$order->delivered_on}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label>Amount Paid: </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    {{$order->bill_amount}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="https://www.google.co.in/search?q=khud+track+kar+le&rlz=1C5CHFA_enIN702IN702&oq=khud+track+kar+le&aqs=chrome..69i57.5263j0j7&sourceid=chrome&ie=UTF-8" >
                                                        Track Order
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="https://www.google.co.in/search?q=khud+track+kar+le&rlz=1C5CHFA_enIN702IN702&oq=khud+track+kar+le&aqs=chrome..69i57.5263j0j7&sourceid=chrome&ie=UTF-8" >
                                                        Review Product
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="row">
                                               <label> Shipping Details: </label>
                                            </div>

                                            <div class="row">
                                                {{Auth::User()->name}}
                                            </div>

                                            <div class="row">
                                                {{Auth::User()->email}}
                                            </div>

                                        </div>
                                    </div>

                                        <hr style="height:1px;border:none;color:#333;background-color:#333;" />

                                        <div class="order-details-MP order-details-bottom order-actions"> <div class="table-head padding10">
                                                MANAGE ORDER
                                            </div> <ul class="line"> <li class="unit" style="width:32.333333333333%">
                                                    <a id="print-order" data-pagename="order_details_print" alt="Print this page"> <i id="print"></i>PRINT ORDER</a></li>
                                                <li class="unit" style="width:32.333333333333%"> <a class="invoice" data-pagename="details"> <i id="invoice"></i>EMAIL INVOICE
                                                    </a> </li>
                                                </ul>
                                            </div>
                                        <hr style="height:1px;border:none;color:#333;background-color:#333;" />

                                <div class="thumbnail all-product-container " data-product-id="{{$product->id}}" >
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="caption">
                                                <a href="/products/{{$product->id}}" class="link-p" style="overflow: hidden; position: relative;">
                                                    <img src="/instaveritas.png" alt="" style="position: relative;
                        width: 250px; height: auto; max-width: none; max-height: none; left: 0px; top: 0px;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Product ID:</label>
                                                    <a href="/products/{{$product->id}}"> {{$product->id}}</a>
                                                </div>
                                             </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Product Description:</label>
                                                    {{$product->description}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>

                                @endforeach
                            @endcan


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </ul>
@stop