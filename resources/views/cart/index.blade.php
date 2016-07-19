@extends('layouts.app')
@section('content')
    <ul class="list-group">
    <div class="container">

        <div class="form-group" >
            <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
        </div>

        <h3 align="center">Your Cart contains {{count($cart->products)}} products</h3>

    @foreach($cart->products as $product)

        <li class="list-group-item">
            {{--<label> Product id :</label> <a href="/products/{{$product->id}}" >{{$product->id}}<br></a>--}}
            <label> Product id :</label> <a href="{{url('/products/'.$product->id)}}">{{$product->id}}<br></a>
            <label>Product Title:</label> {{$product-> title}} <br>
            <label> Product quantity:</label> {{$product->pivot->quantity}}<br>
            <label>Product Price: </label>{{$product->pivot->totalprice}}<br>

            @include('cart.form.index')
        {{--<form method="POST" action={{url('/cartproducts/'.$product->id)}}>--}}
            {{--{{method_field('DELETE')}}--}}
            {{--{{csrf_field()}}--}}

            {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}

            {{--<input type="hidden" name="cart_id" value="{{$cart->id}}">--}}

            {{--<div class="form-group">--}}
                {{--<button type="submit" class="btn btn-primary">Remove from Cart</button>--}}
            {{--</div>--}}
        {{--</form>--}}

            {{--<form method="POST" action={{url('/cartproducts/'.$product->id)}}>--}}
                {{--{{method_field('PATCH')}}--}}
                {{--{{csrf_field()}}--}}

                {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}

                {{--<input type="hidden" name="cart_id" value="{{$cart->id}}">--}}
                {{--<label>New Quantity:  </label><input type="number" name="updated_quantity" value="" required><br>--}}

                {{--<br>--}}

                {{--<div class="form-group">--}}
                    {{--<button type="submit" class="btn btn-primary">Update Quantity</button>--}}
                {{--</div>--}}
            {{--</form>--}}

            {{--<form method="POST" action={{url('/orders/confirmation')}}>--}}

                {{--{{csrf_field()}}--}}
                {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}
                {{--<input type="hidden" name="quantity" value="1">--}}

                {{--<input type="hidden" name="description" value="{{$product->description}}">--}}
                {{--<input type="hidden" name="title" value="{{$product->title}}">--}}

                {{--<input type="hidden" name="totalprice" value="{{$product->price}}">--}}
                {{--<div class="form-group">--}}
                    {{--<button type="submit" class="btn btn-primary">Buy Now</button>--}}
                {{--</div>--}}
            {{--</form>--}}


        </li>
    @endforeach
    </div>
                    </ul>

@endsection

