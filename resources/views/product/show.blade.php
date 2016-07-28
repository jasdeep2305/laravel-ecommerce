@extends('layouts.app')
@section('content')
    <ul class="list-group">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" ALIGN="CENTER"><h3>{{$product->title}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row"> 
                                <div class="col-md-4">  <label>Product Title : </label></div> 
                                <div class="col-md-6">  
                                    <span class="title" data="{{$product->title}}">
                                    {{$product->title}}</span>
                                </div>
                             </div>
                            <div class="row"> 
                                <div class="col-md-4">  <label>Product Description : </label></div> 
                                <div class="col-md-6">  
                                    <span class="description" data="{{$product->description}}">
                                    {{$product->description}}</span>
                                </div>

                            </div>
                            <div class="row"> 
                                <div class="col-md-4">  <label>Seller : </label></div> 
                                <div class="col-md-6">  {{$product->seller_name}}</div>
                            </div>

                            <div class="row"> 
                                <div class="col-md-4">  <label>Product Price : </label></div> 
                                <div class="col-md-6">  
                                    <span class="price" data="{{$product->price}}">
                                    {{$product->price}}</span>
                                </div>
                            </div>
                            @include('product.product_show')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
@stop


@section('scripts')
    <script>
        var HOME = '{{  url('') }}/';

        $(document).ready(function () {

            $(".add-to-cart-toggle").on('click', function () {

                var button = $(this);

                button.addClass('disabled');

                var product_id = button.data('product-id');
                var quantity = $('#quantity').val();
                var price = button.data('product-price');
                var total_price = quantity * price;


                function addToCart() {

                    button.html('Adding To Cart...');

                    $.ajax({
                                'url': HOME + 'cart',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                'data': {
                                    'product_id': product_id,
                                    'quantity': quantity,
                                    'price': total_price
                                },
                                'method': 'POST'
                            })

                            .success(function () {

                                button.html('Remove From Cart');
                                button.removeClass('disabled');
                                button.attr('data-product-in-cart', '1');

                            });

                }

                function removeFromCart() {
                    button.html('Removing From Cart...');

                    $.ajax({
                                'url': HOME + 'cart',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                'data': {
                                    'product_id': product_id,
                                },
                                'type': 'DELETE'
                            })

                            .success(function () {

                                button.html('Add To Cart');
                                button.removeClass('disabled');
                                button.attr('data-product-in-cart', '0');

                            });

                }

                console.log(button.attr('data-product-in-cart'));

                if (button.attr('data-product-in-cart') == 1) {
                    console.log('removing ' + button.attr('data-product-in-cart'));
                    removeFromCart();
                } else if(button.attr('data-product-in-cart') == 0) {
                    console.log('adding ' + button.attr('data-product-in-cart'));
                    addToCart();
                }
            });
        });


        $(".buy-now").on('click', function () {

            var product_id = $(this).data('product-id');
            var quantity = $('#quantity').val();
            var temp_price= $('.price');
            var price =temp_price.attr('data');
            var temp_title = $('.title');
            var title= temp_title.attr('data');

            var temp_description = $('.description');
            var description= temp_description.attr('data');

            var total_price = quantity * price;

            console.log(product_id);
            console.log(quantity);
            console.log(price);
            console.log(title);
            console.log(description);

            $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },

                        'url': HOME + 'orders/confirmation',
                        'data': {
                            'product_id': product_id,
                            'quantity': quantity,
                            'price': total_price,
                            'title' : title
                        },
                        'method': 'POST',
                    })

                    .success(function (response) {

                        console.log('success');

                    });
        });
    </script>
@endsection


