@extends('layouts.app')
@section('content')

    {{--{{$product->details}}--}}
    <div class="content">
        <li class="list-group-item">
            {{$product->title}}<br>
            {{$product->description}}<br>
            {{$product->seller_name}}<br>
            {{$product->price}}<br>

            <form method="POST" action="/cartproducts">

                {{csrf_field()}}

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </div>
            </form>

            <form method="POST" action="/orders">

                {{csrf_field()}}

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buy Now</button>
                </div>
            </form>


        </li>

    </div>
@stop