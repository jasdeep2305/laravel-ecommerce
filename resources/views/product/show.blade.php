@extends('layouts.app')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<ul class="list-group">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading" ALIGN="CENTER">
                            <h3>Popular Products</h3>
                        </div>
                    </div>
                    @include('product.product_show_data')
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading" ALIGN="CENTER"><h3>{{$product->title}}</h3>
                        </div>
                    </div>
                        <div class="panel-body">
                            @include('product.product_show')
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
                var quantity = $('.quantity-select').val();
                var price = button.data('product-price');
                //var total_price = quantity * price;

                console.log('quant '+quantity);
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
                                    'price': price
                                },
                                'method': 'POST'
                            })

                            .success(function () {

                                button.html(' Remove From Cart');
                                button.addClass('fa fa-shopping-cart');
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

    </script>
@endsection


