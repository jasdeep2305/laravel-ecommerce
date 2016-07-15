

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
                                    <b>Order ID: <a href={{url('/orders/'.$order->id)}}> {{$order->id}} </a></b> <br>
                                    Order Placed on: {{$order->placed_on}} <br>
                                    Total Price: {{$order->bill_amount}}
                                    <br>
                                    <form method="POST" action={{url('/payment/'.$order->id)}}>
                                        {{csrf_field()}}
                                        <br>
                                        <input type="hidden" name="bill_payment" value={{$order->bill_amount}}>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"> Make Payment </button>
                                        </div>
                                    </form>


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