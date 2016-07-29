@extends('layouts.app')
@section('content')

    <div class="container">

        {{--<div class="col-md-3 col-sm-3"></div>--}}
        <div class="col-md-12 col-sm-12">
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
            <table class="table table-bordered">
                <tr>
                    <td>
                        <label> Product id :</label>
                    </td>
                    <td>
                        <label>Product Title:</label>
                    </td>
                    {{--<td>--}}
                        {{--<label>Product quantity:</label>--}}
                    {{--</td>--}}
                    <td>
                        <label>Product Price: </label>
                    </td>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                        <label>Total Price: </label>
                    </td>

                </tr>
                @foreach($cart->products as $product)

                    <tr class="cart-product-container" data-product-id="{{$product->id}}">
                        <td>
                            <button type="button" class="btn btn-default btn-xs remove-from-cart"
                                    data-product-id="{{$product->id}}"
                                    title="Remove Product from Cart">
                                <span aria-hidden="true">X</span>
                            </button>
                            &nbsp; &nbsp;
                            <a href="{{url('/products/'.$product->id)}}">  {{$product->id}}</a>
                        </td>
                        <td>
                            {{$product-> title}}
                        </td>
                        <td class="hidden">
                                <span class="cart-product-quantity hidden"
                                      data-product-id="{{$product->id}}"
                                      {{--data-total-price="{{$product->pivot->totalprice}}"--}}
                                      data-product-quantity="{{$product->pivot->quantity}}">
                                    {{$product->pivot->quantity}}</span>
                        </td>

                        <td>
                            {{$product->price}}
                        </td>
                        <td>
                            {!! Form::selectRange('updated_quantity', 1, 10, $product->pivot->quantity,
                            ['data-product-id' => $product->id, 'data-product-price'=>$product->price,
                            'class' => 'update-quantity-select']) !!}

                            <br>
                            {!! Form::close() !!}
                        </td>
                        <td>
                           <span class="data-product-price"
                                 data-product-id="{{$product->id}}">{{ $product->pivot->totalprice }}</span>
                            {{--<span class="data-product-sum hidden" id="sum" >{{$product->pivot->totalprice}}</span>--}}
                        </td>

                    </tr>
                @endforeach

            </table>


            <div class=" totalAmountArea">
                <div class="row ">
                    <div class="col-sm-4 col-sm-offset-10 col-xs-12">

                            <h4>Grand Total: &nbsp; &nbsp; <span class="grandTotal">{{$cart->totalprice()}}</span></h4>

                    </div>
                </div>
            </div>
            <div class="chkBtnArea col-sm-offset-11">

            <a href="{{url('/checkout')}}" class="btn btn-primary ">Check Out<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

            </div>


        </div>
    </div>

@endsection


@section('scripts')

    <script>

        $(".update-quantity-select").on('change', function () {

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
                    'totalprice': total_price,

                },
                'type': 'PUT'
            }).success(function (response) {

                console.log('success');

                var counter = $("span[data-product-id='" + product_id + "'].cart-product-quantity");
                counter.attr('data-product-quantity', updated_quantity);
                counter.html(updated_quantity);

                var counter_total_price = $("span[data-product-id='" + product_id + "'].data-product-price");
                counter_total_price.attr('data-total-price',total_price);
                counter_total_price.html(total_price);


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


    </script>
@endsection