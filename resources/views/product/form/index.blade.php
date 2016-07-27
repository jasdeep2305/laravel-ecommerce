<div class="panel-body" id="panel-for-product">

@foreach($products as $product)

        <li class="list-group-item all-product-container" data-product-id="{{$product->id}}">
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
            {!! Form::label('product_title', 'Product Title :')!!}
        </div>
        <div class="col-md-6">
           <span class="title" data="{{$product->title}}"> {!! link_to('/products/'.$product->id, $title = $product->title, $attributes = ['title'], $secure = null) !!}
            </span>
               <br>
        </div>
    </div>
    {!! Form::model ($product,['method'=>'POST','url'=>'/cart']) !!} <br>
    <div class="row">
        <div class="col-md-4">
            {!! Form::label('product_description', 'Product Description :')!!}
        </div>
        <div class="col-md-6">
            <span class="description" data="{{$product->description}}">{!! Form::text ('description',null,['class'=>'form-control','readonly']) !!}
            </span>
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
            @if(Auth::check()&&Auth::user()->cart)
            <a class="btn btn-default add-to-cart" data-product-id="{{$product->id}}">Add To Cart</a>
            @endif
        </div>
        <div class="col-md-6">
            {{--{!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}--}}
            {{--{!! Form::hidden('product_id',$product->id) !!}--}}
            {{--{!! Form::hidden('quantity','1') !!}--}}
            {{--{!! Form::hidden('description',$product->description) !!}--}}
            {{--{!! Form::hidden('title',$product->title) !!}--}}
            {{--{!! Form::hidden('price',$product->price) !!}--}}
            {{--{!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Now']) !!}--}}
            {{--{!! Form::close() !!}--}}

            <button type="button" class="btn btn-default buy-now" data-product-id="{{$product->id}}">Buy Now</button>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-4">  
                <br>
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
                        <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
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
                                                <button type="button" class="btn btn-default" data-dismiss="modal">NO
                                                </button>
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
        </li>
    @endforeach






@section('scripts')
    <script>


        // .class .col-md-4
        // #id   #add_product
        // tag div, a, span
        // attr


        var HOME = '{{  url('') }}/';

        $(".add-to-cart").on('click', function () {

            console.log('Add to Cart clicked');

            var button = $(this);

            var product_id = $(this).data('product-id');
            var quantity = $('#quantity').val();
            var price = $('#price').val();
            var total_price = quantity * price;

            button.addClass('disabled');
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

                        button.removeClass('add-to-cart');
                        button.addClass('remove-from-cart');
                        button.html('Remove From Cart');

                        button.removeClass('disabled');

                    });

        });

        $(".remove-from-cart").on('click', function () {

            var product_id = $(this).data('product-id');
            console.log('Remove from Cart clicked');
            var button = $(this);
            button.html('Removing from Cart...');

            $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        },

                        'url': 'cart',
                        'data': {
                            'product_id': product_id
                        },
                        'type': 'DELETE'
                    })

                    .success(function () {

                        button.addClass('add-to-cart');
                        button.removeClass('remove-from-cart');
                        button.html('Add to Cart');

                        button.removeClass('disabled');

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

                            var counter = $(".product-counter");
                            var new_count = counter.attr('data-count') - 1;
                            counter.attr('data-count',new_count);
                            console.log(new_count);
                            counter.html(new_count);

                            $("li[data-product-id='" + product_id + "']").fadeOut(500)

                        }

                    }).error(function (error) {
                console.log(error);
            })
        });

        $(".buy-now").on('click', function () {
            var product_id = $(this).data('product-id');
            var quantity = $('#quantity').val();
            var price = $('#price').val();
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