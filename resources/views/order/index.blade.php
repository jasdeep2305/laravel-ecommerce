

@extends('layouts.app')
@section('content')
    <ul class="list-group">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Your Orders</div>

                        <div class="panel-body">
                            Total Items ordered: {{count($orders)}} <br>
                            @foreach($orders as $order)

                                <li class="list-group-item">
                                    <b>Order ID: <a href="/orders/{{$order->id}}}"> {{$order->id}} </a></b> <br>
                                    Order Placed on: {{$order->placed_on}} <br>
                                    Total Price: {{$order->bill_amount}}


                                </li>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>






        {{--<form method="POST" action="/order/{{$order->id}}/edit">--}}
            {{--</form>--}}



            {{--<div class="form-group">--}}
                {{--<button type="submit" class="btn btn-primary">Edit Order--}}
                {{--</button>--}}
              {{--</div>--}}
            {{--</form>--}}
    </ul>
@stop