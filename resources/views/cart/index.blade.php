@extends('layouts.app')
@section('content')

    <div class="container">
        <ul class="list-group">
            <div class="form-group">
                <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" ALIGN="CENTER">
                    <h3>Your Cart contains
                        <span class="cart-product-counter"
                              data-count="{{count($cart->products)}}">{{count($cart->products)}}</span>
                        products
                    </h3>
                </div>
            </div>

            @foreach($cart->products as $product)

                <li class="list-group-item cart-product-container" data-product-id="{{$product->id}}">
                    <div class="row">
                        <div class="col-md-4">
                            <label> Product id :</label>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('/products/'.$product->id)}}">{{$product->id}}</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Product Title:</label>
                        </div>
                        <div class="col-md-6">
                            {{$product-> title}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label> Product quantity:</label>
                        </div>
                        <div class="col-md-6">
                            <span class="cart-product-quantity" data-count="{{$product->pivot->quantity}}">{{$product->pivot->quantity}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Product Price: </label>
                        </div>
                        <div class="col-md-6">
                            {{$product->pivot->totalprice}}
                        </div>
                    </div>

                    @include('cart.form.index')
                </li>
            @endforeach

        </ul>

    </div>

@endsection


@section('scripts')

    <script>

        $(".update-quantity").on('click', function () {

            var product_id = $(this).data('product-id');
            var quantity = $('#updated_quantity').val();
            var price = $(this).data('product-price');
            var total_price = quantity * price;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },

                'url': 'cart',
                'data': {
                    'product_id': product_id,
                    'quantity': quantity,
                    'price': total_price,

                },
                'type': 'PUT'
            }).success(function (response) {

                console.log(response);
                var new_quantity = $('.cart-product-quantity');
                new_quantity.attr('data-count', quantity);
                new_quantity.html(quantity);


            }).error(function (error) {

                console.log(error);

            });

        });


        $(".remove-from-cart").on('click', function () {

            var product_id = $(this).data('product-id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },

                'url': 'cart',
                'data': {
                    'product_id': product_id
                },
                'type': 'DELETE'
            }).success(function (response) {

                console.log(response);

                var counter = $('.cart-product-counter');
                var new_count = counter.attr('data-count') - 1;

                counter.attr('data-count', new_count);
                counter.html(new_count);

                $("li[data-product-id='" + product_id + "']").fadeOut(500);

            }).error(function (error) {

                console.log(error);

            });


        });

    </script>
@endsection