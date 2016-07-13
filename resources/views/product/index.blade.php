@extends('layout')
@section('content')
    <ul class="list-group">

        @foreach($products as $product)

            <li class="list-group-item">
                <a href="/products/{{$product->id}}" > Title: {{$product->title}} <br></a>
                Description: {{$product->description}} <br>
                Price: {{$product->price}}


                <form method="POST" action="/cartproducts">

                {{csrf_field()}}

                    <input type="hidden" name="product_id" value="{{$product->id}}">

                    <input type="number" name="quantity" value="1">
                    <input type="number" name="totalprice" value="1000">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                </form>

            </li>

        @endforeach</ul>
@stop
