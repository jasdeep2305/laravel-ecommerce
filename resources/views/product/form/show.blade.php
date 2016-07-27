<div class="row">
    <div class="col-md-12">

        {!! Form::model ($product,['method'=>'POST','url'=>'/cart']) !!}
        {!! Form::hidden('product_id',$product->id) !!}
        <div class="row"> 
            <div class="col-md-4">  
                {!! Form::label('quantity', 'Product Quantity')!!}
            </div> 
            <div class="col-md-6">  
                {!! Form::selectRange('quantity', 1, 10) !!}
            </div> 
        </div>

        <div class="row">
            <div class="col-md-4">
                {!! Form::hidden('description',$product->description) !!}
                {!! Form::hidden('title',$product->title) !!}
                {!! Form::hidden('price',$product->price) !!}<br>
                {{--{!! Form::submit('Add To Cart',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Now']) !!}--}}


                <a class="btn btn-default add-to-cart" data-product-id="{{$product->id}}" data-product-price="{{$product->price}}">Add To Cart</a>
                {!! Form::close() !!}

            </div>
            <div class="col-md-6">
                {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
                {!! Form::hidden('product_id',$product->id) !!}
                {!! Form::hidden('quantity','1') !!}
                {!! Form::hidden('description',$product->description) !!}
                {!! Form::hidden('title',$product->title) !!}
                {!! Form::hidden('price',$product->price) !!}<br>
                {!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Now']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>



@section('scripts')
    <script>
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
    </script>
@endsection


