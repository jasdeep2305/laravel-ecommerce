<div class="panel-body" id="panel-for-product">

@foreach($products as $product)

    <div class="row">
        <div class="col-md-4">
            {!! Form::label('product_title', 'Product Title :')!!}
        </div>
        <div class="col-md-6">
            {!! link_to('/products/'.$product->id, $title = $product->title, $attributes = ['title'], $secure = null) !!}
            <br>
        </div>
    </div>
    {!! Form::model ($product,['method'=>'POST','url'=>'/cart']) !!} <br>
    <div class="row">
        <div class="col-md-4">
            {!! Form::label('product_description', 'Product Description :')!!}
        </div>
        <div class="col-md-6">
            {!! Form::text ('description',null,['class'=>'form-control','readonly']) !!}
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            {!! Form::label('quantity', 'Select Product Quantity : ')!!}
        </div>
        <div class="col-md-6">
            {!! Form::selectRange('quantity', 1, 10) !!}<br>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            {!! Form::label('price', 'Product Price : ')!!}
        </div>
        <div class="col-md-6">
            {!! Form::number ('price',null,['class'=>'form-control','readonly']) !!}<br>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-default add-to-cart" data-product-id="{{$product->id}}">Add To Cart</a>
        </div>
        <div class="col-md-6">
            {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
            {!! Form::hidden('product_id',$product->id) !!}
            {!! Form::hidden('quantity','1') !!}
            {!! Form::hidden('description',$product->description) !!}
            {!! Form::hidden('title',$product->title) !!}
            {!! Form::hidden('price',$product->price) !!}
            {!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Now']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-4">  

            @if(Auth::check()&&Auth::user()->level_id<3)
                {!! Form::model($product,['url'=>'/products/'.$product->id.'/edit','method'=>'GET']) !!}

                {!! Form::hidden('product_id',$product->id) !!}
                {!! Form::hidden('quantity',$product->quantity) !!}
                {!! Form::hidden('description',$product->description) !!}
                {!! Form::hidden('title',$product->title) !!}
                {!! Form::hidden('price',$product->price) !!}
                {!! Form::submit('Edit the Product',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Edit this Product']) !!}
                {!! Form::close() !!}
            @endif
        </div>
         
        <br>
        <div class="col-md-6">  
            @if(Auth::check()&&Auth::user()->level_id<3)


                <button type="button" class="btn btn-default" title="Delete Product" data-toggle="modal"
                        data-target="#deleteProduct">
                    Delete Product
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                Do you really want to remove this product ?
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-4">

                                        <a class="btn btn-default delete-the-product"
                                           data-product-id="{{$product->id}}" data-dismiss="modal">YES</a>

                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
         
    </div>
    <br>
@endforeach
</div>


@section('scripts')
    <script>


        // .class .col-md-4
        // #id   #add_product
        // tag div, a, span
        // attr


        var HOME = '{{  url('') }}/';

        $(".add-to-cart").on('click', function () {

            console.log('clicked');

            var product_id = $(this).data('product-id');
            var quantity = $('#quantity').val();
            var price = $('#price').val();
            var total_price = quantity * price;

            $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        'url': HOME + 'cart',
                        'data': {
                            'product_id': product_id,
                            'quantity': quantity,
                            'price': total_price
                        },
                        'method': 'POST'
                    })

                    .success(function () {
                        window.location = HOME + 'cart';
                    });

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
                            console.log(response.message);
                            //$(".panel-for-product").fadeOut()
                           // window.location.reload();
                        }

                    });
        });
        // delete
        // and remove/fade div from DOM

    </script>
@endsection