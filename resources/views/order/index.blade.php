

@extends('layouts.app')
@section('content')
    <ul class="list-group">
        <div class="content">
            <div class="title">Your Cart</div>
        </div>


        @foreach($orders as $order)

            <li class="list-group-item">
              <b>Order ID: <a href="/order/{{$order->id}}}"> {{$order->id}} </a></b> <br>
                Order Placed on: {{$order->placed_on}} <br>
                Total Price: {{$order->bill_amount}}

            </li>

        @endforeach

        {{--<form method="POST" action="/order/{{$order->id}}/edit">--}}
            {{--</form>--}}
</div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Edit Order
                </button>
              </div>
            </form>
    </ul>
@stop