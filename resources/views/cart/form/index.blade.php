<div class="row">

    {!! Form::model($product,['url'=>'/cart','method'=>'PUT'])!!}
    {!! Form::hidden('product_id',$product->id) !!}
    {!! Form::hidden('cart_id',$cart->id) !!} <br>
    <div class="col-md-4">
        {!! Form::label('updated_quantity', 'New Quantity : ')!!}
        {!! Form::selectRange('updated_quantity', 1, 10) !!}<br>
    </div>
    <div class="col-md-4">
        {{--{!! Form::submit('Update Quantity',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Update Quantity']) !!}--}}
        <button class="btn btn-default update-quantity" data-product-id="{{$product->id}}"
           data-product-price="{{$product->price}}">Update Quantity</button>
    </div>
    {!! Form::close() !!}
</div>
<br>
<div class="row">
    <div class="col-md-4">
        {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
        {!! Form::hidden('product_id',$product->id) !!}
        {!! Form::hidden('quantity',$product->quantity) !!}
        {!! Form::hidden('description',$product->description) !!}
        {!! Form::hidden('title',$product->title) !!}
        {!! Form::hidden('price',$product->price) !!}
        {!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Product']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-4">
        <button type="button" class="btn btn-default remove-from-cart" data-product-id="{{$product->id}}"
                title="Remove Product from Cart">
            Remove from Cart
        </button>

    </div>
</div>



