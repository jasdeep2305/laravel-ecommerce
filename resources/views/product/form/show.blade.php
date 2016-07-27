<div class="row">
    <div class="col-md-12">

        {{--{!! Form::model ($product,['method'=>'POST','url'=>'/cart']) !!}--}}
        {{--{!! Form::hidden('product_id',$product->id) !!}--}}

        {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
        <div class="row"> 
            <div class="col-md-4">  
                {!! Form::label('quantity', 'Select Product Quantity : ')!!}
            </div>
            <div class="col-md-6">  
                {!! Form::selectRange('quantity', 1, 10) !!}
            </div>
             
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                @if(Auth::check()&&Auth::user()->cart)
                    <a class="btn btn-default add-to-cart-toggle" data-product-in-cart="0"
                       data-product-id="{{$product->id}}" data-product-price="{{$product->price}}">Add To Cart</a>
                @endif
            </div>
            <div class="col-md-6">

                {!! Form::hidden('product_id',$product->id) !!}
                {!! Form::hidden('quantity','1') !!}
                {!! Form::hidden('description',$product->description) !!}
                {!! Form::hidden('title',$product->title) !!}
                {!! Form::hidden('price',$product->price) !!}<br>
                {!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Now']) !!}

            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

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

                console.log(quantity);

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

    </script>
@endsection