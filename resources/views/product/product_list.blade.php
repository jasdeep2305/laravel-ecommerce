@foreach($products as $product)
    <div class="col-lg-4 col-sm-4 hero-feature text-center">
        <div class="thumbnail all-product-container " data-product-id="{{$product->id}}">
            <div class="caption">
                <a href="products/{{$product->id}}" class="link-p" style="overflow: hidden; position: relative;">
                    <img src="instaveritas.png" alt="" style="position: relative; width: 120px; height: auto; max-width: none; max-height: none; left: 0px; top: 0px;">
                </a>
                <h4><span class="title" data="{{$product->title}}"> {!! link_to('/products/'.$product->id, $title = $product->title, $attributes = ['title'], $secure = null) !!}</span></h4>
                <p><span class="description" data="{{$product->description}}">{{$product->description}}</span></p>
                {!! Form::selectRange('updated_quantity', 1, 10, 1,['data-product-id' => $product->id, 'class' => 'quantity-select']) !!}

                <br>
                <span class="price" data="{{$product->price}}">Rs. {{$product->price}}</span>
                @if(Auth::check())
                    <a class="btn add-to-cart-toggle" href="#" data-product-in-cart="0"
                       data-product-id="{{$product->id}}" data-product-price="{{$product->price}}">
                        Add To Cart<i class="icon-shopping-cart"></i></a>
                @endif
                <p>
                    @if(Auth::check()&&Auth::user()->level_id<3)
                        {!! Form::model($product,['url'=>'/products/'.$product->id.'/edit','method'=>'GET']) !!}
                        {!! Form::hidden('product_id',$product->id) !!}
                        {!! Form::hidden('quantity',$product->quantity) !!}
                        {!! Form::hidden('description',$product->description) !!}
                        {!! Form::hidden('title',$product->title) !!}
                        {!! Form::hidden('price',$product->price) !!}

                        <button class='btn btn-default btn-xs',data-toggle='tooltip', data-placement='top',title='Edit this Product' >
                            Edit Product
                        </button>
                        {{--{!! Form::submit('Edit the Product',['class'=>'btn btn-default btn-xs','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Edit this Product']) !!}--}}
                        {!! Form::close() !!}
                        <br>
                        <button class="btn btn-default btn-xs" title="Delete Product" data-toggle="modal" data-target="#deleteProduct">
                            Delete Product
                        </button>
                    @endif
                </p>
            </div>

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
        </div>
    </div>

@endforeach