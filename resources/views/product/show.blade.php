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
                                    {{$product->price}}<span>
                                </div>
                            </div>
                            @include('product.form.show')
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
        $(".add-to-cart").on('click', function () {

            console.log('clicked');

            var HOME = '{{  url('') }}/';

            var product_id = $(this).data('product-id');
            var quantity = $('#quantity').val();
            var price = $(this).data('product-price');
            var total_price = quantity * price;

            console.log(quantity);
            console.log(price);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                'url': HOME + 'cart',
                'data': {
                    'product_id': product_id,
                    'quantity': quantity,
                    'price': total_price
                },
                'method': 'POST'
            })
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


