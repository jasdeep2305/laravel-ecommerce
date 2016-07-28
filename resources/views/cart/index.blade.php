@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="col-md-3 col-sm-3"></div>
        <div class="col-md-9 col-sm-9">
            {{--<ul class="list-group">--}}
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


            {{--<li class="list-group-item cart-product-container" data-product-id="{{$product->id}}">--}}

            <table class="table table-bordered">
                <tr>
                    <td>
                        <label> Product id :</label>
                    </td>
                    <td>
                        <label>Product Title:</label>
                    </td>
                    <td>
                        <label>Product quantity:</label>
                    </td>
                    <td>
                        <label>Product Price: </label>
                    </td>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                        <label>Total Price: </label>
                    </td>
                    <td>
                        <label>Options</label>
                    </td>
                </tr>
                @foreach($cart->products as $product)

                    <tr class="cart-product-container" data-product-id="{{$product->id}}">
                        <td>
                            <a href="{{url('/products/'.$product->id)}}">{{$product->id}}</a>
                        </td>
                        <td>
                            {{$product-> title}}
                        </td>
                        <td>
                                <span class="cart-product-quantity"
                                      data-product-id="{{$product->id}}"
                                      data-count="{{$product->pivot->quantity}}">
                                    {{$product->pivot->quantity}}</span>
                        </td>

                        <td>
                            {{$product->price}}
                        </td>
                        <td>
                            {{--{!! Form::model($product,['url'=>'/cart','method'=>'PUT'])!!}--}}
                            {{--{!! Form::hidden('product_id',$product->id) !!}--}}
                            {{--{!! Form::hidden('cart_id',$cart->id) !!}--}}
                            {{--{!! Form::label('updated_quantity', 'Quantity:')!!}--}}
                            {!! Form::selectRange('updated_quantity', 1, 10, $product->pivot->quantity,['data-product-id' => $product->id, 'class' => 'update-quantity-select']) !!}

                            <br>
                            {{--{!! Form::submit('Update Quantity',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Update Quantity']) !!}--}}
                            <button class="update-quantity" data-product-id="{{$product->id}}"
                                    data-product-price="{{$product->price}}">Save
                            </button>

                            {{--{!! Form::close() !!}--}}
                        </td>
                        <td>{{ $product->pivot->totalprice }}</td>
                        <td>
                            {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
                            {!! Form::hidden('product_id',$product->id) !!}
                            {!! Form::hidden('quantity',$product->quantity) !!}
                            {!! Form::hidden('description',$product->description) !!}
                            {!! Form::hidden('title',$product->title) !!}
                            {!! Form::hidden('price',$product->price) !!}
                            <span class="price hidden" data="{{$product->price}}">
                                    {{$product->price}}</span>
                            <button class="btn btn-default buy-now" data-product-id="{{$product->id}}"
                                    title="Buy now">
                                Buy Now
                            </button>
                            {{--{!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Product']) !!}--}}
                            {!! Form::close() !!}

                            <button type="button" class="btn btn-default remove-from-cart"
                                    data-product-id="{{$product->id}}"
                                    title="Remove Product from Cart">
                                Remove from Cart
                            </button>
                        </td>
                    </tr>
                @endforeach

            </table>


        </div>
    </div>

@endsection


@section('scripts')

    <script>

        $(".update-quantity").on('click', function () {

            var product_id = $(this).data('product-id');

            //var updated_quantity = $(this).parent().find('#updated_quantity').val();
            var updated_quantity = $("select[data-product-id='" + product_id + "'].update-quantity-select").val();

            var price = $(this).data('product-price');
            var total_price = updated_quantity * price;

            console.log(product_id);
            console.log(updated_quantity);
            console.log(price);
            console.log(total_price);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },

                'url': 'cart',
                'data': {
                    'product_id': product_id,
                    'quantity': updated_quantity,
                    'price': total_price,

                },
                'type': 'PUT'
            }).success(function (response) {

                console.log('success');

                var counter = $("span[data-product-id='" + product_id + "'].cart-product-quantity");
                counter.attr('data-product-quantity', updated_quantity);
                counter.html(updated_quantity);


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

                $("tr[data-product-id='" + product_id + "']").fadeOut(500);

            }).error(function (error) {

                console.log(error);

            });


        });


        $(".buy-now").on('click', function () {

            var product_id = $(this).data('product-id');
            var quantity = $('#quantity').val();
            var temp_price = $('.price');
            var price = temp_price.attr('data');
            var temp_title = $('.title');
            var title = temp_title.attr('data');

            var temp_description = $('.description');
            var description = temp_description.attr('data');

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
                            'title': title
                        },
                        'method': 'POST',
                    })

                    .success(function (response) {

                        console.log('success');

                    });
        });


    </script>
@endsection