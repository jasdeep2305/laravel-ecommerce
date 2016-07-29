{{--<div class="col-lg-12 col-sm-12 hero-feature text-center">--}}
{{--<div class="thumbnail all-product-container " data-product-id="{{$product->id}}" >--}}
{{----}}
{{----}}
{{----}}
{{----}}
{{--<div class="row">--}}
{{--<div class="col-lg-2">--}}
{{--<div class="caption">--}}
{{--<a href="/products/{{$product->id}}" class="link-p" style="overflow: hidden; position: relative;">--}}
{{--<img src="/instaveritas.png" alt="" style="position: relative;--}}
{{--width: 250px; height: auto; max-width: none; max-height: none; left: 0px; top: 0px;">--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-8">--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<br>--}}
{{--<h4>Best Price: <span class="price" data="{{$product->price}}">Rs. {{$product->price}}</span>--}}
{{--</h4>--}}

{{--{!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}--}}
{{--<br>--}}
{{--Quantity :--}}
{{--{!! Form::selectRange('quantity', 1, 10, 1,['data-product-id' => $product->id, 'class' => 'quantity-select']) !!}--}}
{{--<br>--}}
{{--<br>--}}

{{--<a class="btn btn-default add-to-cart-toggle" data-product-in-cart="0"--}}
{{--data-product-id="{{$product->id}}" data-product-price="{{$product->price}}" > Add To <i class="fa fa-shopping-cart"></i> </a>--}}
{{--<br>--}}

{{--<br>--}}

{{--{!! Form::hidden('product_id',$product->id) !!}--}}
{{--{!! Form::hidden('description',$product->description) !!}--}}
{{--{!! Form::hidden('title',$product->title) !!}--}}
{{--{!! Form::hidden('price',$product->price) !!}--}}
{{--{!! Form::hidden('source','fromproduct') !!}--}}
{{--{!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Product']) !!}--}}
{{--{!! Form::close() !!}--}}

{{--<br>--}}
{{--Sold By: {{$product->seller_name}}--}}
{{--</div>--}}


{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--<br>--}}
{{--<hr style="height:1px;border:none;color:#333;background-color:#333;" />--}}
{{--@include('product.product_show_static_data')--}}
{{--</div>--}}
{{--</div>--}}


<div class="col-lg-12 col-sm-12 hero-feature">

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- Main Image -->
            <div class="product-main-image-container">
                <img src="/instaveritas.png" alt="" class="product-loader" style="display: none;">
                    <span class="thumbnail product-main-image" style="position: relative; overflow: hidden;">
                        <img src="/instaveritas.png" alt="">
                    </span>
            </div>
            <!-- End Main Image -->
        </div>

        <div class="visible-xs">
            <div class="clearfix"></div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="well product-short-detail">
                <div class="row">
                    <div class="the-list">
                        <h4 class="col-xs-4">Best Price:</h4>
                        <h4 class="col-xs-6">
                            <!-- <span class="price-old">$169</span> -->
                            Rs. {{$product->price}}
                        </h4>
                    </div>
                    <div class="the-list">
                        <h4 class="col-xs-4">Quanity:</h4>
                        <h4 class="col-xs-6">
                            {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
                            {!! Form::selectRange('quantity', 1, 10, 1,['data-product-id' => $product->id, 'class' => 'quantity-select']) !!}
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-xs-12 input-qty-detail">
                        <a class="btn btn-default add-to-cart-toggle" data-product-in-cart="0"
                           data-product-id="{{$product->id}}" data-product-price="{{$product->price}}">
                            Add To <i class="fa fa-shopping-cart"></i> </a>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        {!! Form::hidden('product_id',$product->id) !!}
                        {!! Form::hidden('description',$product->description) !!}
                        {!! Form::hidden('title',$product->title) !!}
                        {!! Form::hidden('price',$product->price) !!}
                        {!! Form::hidden('source','fromproduct') !!}
                        {!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Product']) !!}
                        {!! Form::close() !!}

                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-xs-12 add-to-detail">


                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <br clear="all">

        <div class="col-xs-12 product-detail-tab">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
                <li><a href="#detail" data-toggle="tab">Detail</a></li>
                <li><a href="#review" data-toggle="tab">Review</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="desc">
                    <div class="well">
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                <div class="tab-pane" id="detail">
                    <div class="well">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td width="40%">Lorem</td>
                                <td>Ipsum</td>
                            </tr>
                            <tr>
                                <td>Dolor</td>
                                <td>Sit Amet</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="review">
                    <div class="well">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" alt="64x64"
                                     src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Thor</strong></h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                in faucibus.
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" alt="64x64"
                                     src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>Michael</strong></h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                in faucibus.
                            </div>
                        </div>
                        <hr>
                        <h4>Add your review</h4>
                        <p></p>
                        <form role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option>1 star</option>
                                    <option>2 stars</option>
                                    <option>3 stars</option>
                                    <option>4 stars</option>
                                    <option>5 stars</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Your Review"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
