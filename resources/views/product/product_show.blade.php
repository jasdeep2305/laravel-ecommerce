<div class="col-lg-12 col-sm-12 hero-feature text-center">
    <div class="thumbnail all-product-container " data-product-id="{{$product->id}}" >
        <div class="row">
            <div class="col-lg-4">
                <div class="caption">
                    <a href="/products/{{$product->id}}" class="link-p" style="overflow: hidden; position: relative;">
                        <img src="/instaveritas.png" alt="" style="position: relative;
                        width: 250px; height: auto; max-width: none; max-height: none; left: 0px; top: 0px;">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h4>Best Price: <span class="price" data="{{$product->price}}">Rs. {{$product->price}}</span>
                        </h4>

                        {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
                        <br>
                        Quantity :
                        {!! Form::selectRange('quantity', 1, 10, 1,['data-product-id' => $product->id, 'class' => 'quantity-select']) !!}
                        <br>
                        <br>

                        <a class="btn btn-default add-to-cart-toggle" data-product-in-cart="0"
                           data-product-id="{{$product->id}}" data-product-price="{{$product->price}}" > Add To <i class="fa fa-shopping-cart"></i> </a>
                        <br>

                        <br>

                        {!! Form::hidden('product_id',$product->id) !!}
                        {!! Form::hidden('description',$product->description) !!}
                        {!! Form::hidden('title',$product->title) !!}
                        {!! Form::hidden('price',$product->price) !!}
                        {!! Form::hidden('source','fromproduct') !!}
                        {!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Product']) !!}
                        {!! Form::close() !!}

                        <br>
                        Sold By: {{$product->seller_name}}
                    </div>


                </div>

            </div>
        </div>
<br>
        <hr style="height:1px;border:none;color:#333;background-color:#333;" />
        @include('product.product_show_static_data')
     </div>
</div>
