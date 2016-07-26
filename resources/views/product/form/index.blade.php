
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

                    {{--<a href="#" class="dropdown-toggle" id="quantity" data-toggle="dropdown" role="button"--}}
                       {{--aria-haspopup="true" aria-expanded="true">--}}
                        {{--Select <span class="caret"></span>--}}
                    {{--</a>--}}

                    {{--<ul class="dropdown-menu" id="menu1" aria-labelledby="drop4">--}}
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                    {{--</ul>--}}

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
                    {{--{!! Form::hidden('product_id',$product->id) !!}--}}
                    {{--{!! Form::submit('Add To Cart',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Add A Product']) !!}--}}
                    {{--{!! Form::close() !!}--}}

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
                        {{--{!! Form::model($product,['url'=>'/products/'.$product->id,'method'=>'DELETE']) !!}--}}
                        {{--{!! Form::submit('Delete the Product',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Delete this Product']) !!}--}}
                        {{--{!! Form::close() !!}--}}


                        <button type="button" class="btn btn-default"  title="Delete Product" data-toggle="modal" data-target="#deleteProduct">
                            Delete Product
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to remove this product ?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-md-4">
                                                {!! Form::model($product,['url'=>'/products/'.$product->id,'method'=>'DELETE']) !!}
                                                {!! Form::submit('Delete the Product',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Delete this Product']) !!}
                                                {!! Form::close() !!}
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


@section('scripts')

    <script>

        $(".add-to-cart").on('click',function () {

            var product_id= $(this).data('product-id');
            var quantity = $('#quantity').val();
            var price = $('#price').val();
            var total_price= quantity * price;

            console.log(total_price);

            //console.log('clicked');

            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },

                'url':'cart',
                'data':{
                    'product_id':product_id,
                    'quantity': quantity,
                    'price':total_price,

                },
                'method':'POST'
            });

        });
    </script>
@endsection