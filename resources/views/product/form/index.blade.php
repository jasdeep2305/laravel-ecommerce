@foreach($products as $product)

        <li class="list-group-item all-product-container" data-product-id="{{$product->id}}">
            <div class="row">
                <div class="col-md-4">
                    <label>Product Title:</label>
                </div>
                <div class="col-md-6">
           <span class="title" data="{{$product->title}}"> {!! link_to('/products/'.$product->id, $title = $product->title, $attributes = ['title'], $secure = null) !!}
            </span>
                </div>
            </div>
        <br>
            <div class="row">
                <div class="col-md-4">
                    <label>Product Description:</label>
                </div>
                <div class="col-md-6">
            <span class="description" data="{{$product->description}}">{{$product->description}}
            </span>
                    <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    {!! Form::label('quantity', 'Select Product Quantity : ')!!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectRange('quantity', 1, 10) !!}<br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label>Product Price:</label>
                </div>
                <div class="col-md-6">
                   <span class="price" data="{{$product->price}}">{{$product->price}}
            </span><br>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    @if(Auth::check()&&Auth::user()->cart)
                        <a class="btn btn-default add-to-cart-toggle" data-product-in-cart="0"
                           data-product-id="{{$product->id}}" data-product-price="{{$product->price}}">Add To Cart</a>
                    @endif
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

                                $("li[data-product-id='" + product_id + "']").fadeOut(500)

                            }

                        }).error(function (error) {
                    console.log(error);
                })
            });
            // delete
            // and remove/fade div from DOM

        </script>
@endsection