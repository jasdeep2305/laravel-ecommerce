<div class="row">
    <div class="col-md-12">

        {{--{!! Form::model ($product,['method'=>'POST','url'=>'/cart']) !!}--}}
        {{--{!! Form::hidden('product_id',$product->id) !!}--}}

        {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
        <div class="row"> 
            <div class="col-md-4">  
                Product Quantity
            </div>
             


            <div class="col-md-6">  
                {!! Form::selectRange('quantity', 1, 10) !!}
            </div>
             
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-default add-to-cart" data-product-id="{{$product->id}}"
                   data-product-price="{{$product->price}}">Add To Cart</a>
            </div>
            <div class="col-md-6">

                {!! Form::hidden('product_id',$product->id) !!}
                {!! Form::hidden('quantity','1') !!}
                {!! Form::hidden('description',$product->description) !!}
                {!! Form::hidden('title',$product->title) !!}
                {!! Form::hidden('price',$product->price) !!}<br>
                {!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Now']) !!}


            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
