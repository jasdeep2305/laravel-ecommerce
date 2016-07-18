@extends('layouts.app')
@section('content')

    <h1 align="center">{{$product->title}}</h1>
    {{--{{$product->details}}--}}
    <div class="content">
        <li class="list-group-item">
            <label>Title: </label> {{$product->title}}<br>
            <label>Description: </label> {{$product->description}}<br>
            <label>Seller: </label>  {{$product->seller_name}}<br>
            <label>Price: </label> {{$product->price}}<br>

            @include('product.form.show')
            {{--<form method="POST" action={{url('/cartproducts')}}>--}}

                {{--{{csrf_field()}}--}}

                {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}

                {{--<label>Quantity to buy: </label> <input type="number" name="quantity" value="1"><br>--}}
                {{--<input type="hidden" name="description" value="{{$product->description}}">--}}
                {{--<input type="hidden" name="title" value="{{$product->title}}">--}}
                {{--<input type="hidden" name="totalprice" value="{{$product->price}}">--}}

                {{--<div class="form-group">--}}
                    {{--<button type="submit" class="btn btn-primary">Add to Cart</button>--}}
                {{--</div>--}}
            {{--</form>--}}

            {{--<form method="POST" action={{url('/orders/confirmation')}}>--}}

                {{--{{csrf_field()}}--}}

                {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}
                {{--<input type="hidden" name="totalprice" value="{{$product->price}}">--}}

                {{--<div class="form-group">--}}
                    {{--<button type="submit" class="btn btn-primary">Buy Now</button>--}}
                {{--</div>--}}
            {{--</form>--}}


        </li>

    </div>
@stop