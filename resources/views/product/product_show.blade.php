<div class="col-lg-12 col-sm-12 hero-feature text-center">
    <div class="thumbnail all-product-container " data-product-id="{{$product->id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="caption">
                    <a href="/products/{{$product->id}}" class="link-p" style="overflow: hidden; position: relative;">
                        <img src="/instaveritas.png" alt="" style="position: relative;
                        width: 250px; height: auto; max-width: none; max-height: none; left: 0px; top: 0px;">
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <h5>Best Price: <span class="price" data="{{$product->price}}">Rs. {{$product->price}}</span>
                        </h5>

                        <br>
                        Quantity :
                        {!! Form::selectRange('updated_quantity', 1, 10, 1,['data-product-id' => $product->id, 'class' => 'quantity-select']) !!}
                        <br>
                        <br>
                        <a class="btn btn-default add-to-cart-toggle" data-product-in-cart="0"
                           data-product-id="{{$product->id}}" data-product-price="{{$product->price}}">Add To Cart</a>
                        <br>
                        <br>
                        <span class="title hidden" data="{{$product->title}}">Rs. {{$product->title}}</span>
                        <button class="btn btn-default buy-now" data-product-id="{{$product->id}}" title="Buy now">Buy Now</button>
                        <br>
                        <br>
                        <p><span class="description" data="{{$product->description}}">{{$product->description}}</span></p>
                    </div>
                    <div class="col-md-6">
                        <br>
                        Sold By: {{$product->seller_name}}
                    </div>
                </div>

            </div>
        </div>
     </div>
</div>
