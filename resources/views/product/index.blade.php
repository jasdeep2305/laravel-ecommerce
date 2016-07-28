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
                            <h3>Categories</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading" ALIGN="CENTER">
                            <h3>All Products</h3>
                        </div>
                        </div>
                        <div class="panel-body">
                            @include('product.product_list')
                        </div>
                        {{$products->links()}}

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

            {{--$(".remove-from-cart").on('click', function () {--}}

            {{--var product_id = $(this).data('product-id');--}}
            {{--console.log('Remove from Cart clicked');--}}
            {{--var button = $(this);--}}
            {{--button.html('Removing from Cart...');--}}

            {{--$.ajax({--}}
            {{--headers: {--}}
            {{--'X-CSRF-TOKEN': "{{csrf_token()}}"--}}
            {{--},--}}

            {{--'url': 'cart',--}}
            {{--'data': {--}}
            {{--'product_id': product_id--}}
            {{--},--}}
            {{--'type': 'DELETE'--}}
            {{--})--}}

            {{--.success(function () {--}}

            {{--button.addClass('add-to-cart');--}}
            {{--button.removeClass('remove-from-cart');--}}
            {{--button.html('Add to Cart');--}}

            {{--button.removeClass('disabled');--}}

            {{--});--}}

            {{--});--}}

        });


        $(".delete-the-product").on('click', function () {
            var product_id = $(this).data('product-id');
            $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        'url': HOME + 'products/' + product_id,
                        'data': {
                            'product_id': product_id,
                        },
                        'type': 'DELETE',
                    })

                    .success(function (response) {
                        if (response.status == 200) {

                            var counter = $(".product-counter");
                            var new_count = counter.attr('data-count') - 1;
                            counter.attr('data-count', new_count);
                            console.log(new_count);
                            counter.html(new_count);

                            $("div[data-product-id='" + product_id + "']").fadeOut(500)

                        }

                    }).error(function (error) {
                console.log(error);
            })
        });
        // delete
        // and remove/fade div from DOM

    </script>
@endsection
