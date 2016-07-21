<div class="row">
    <div class="col-md-4">

        {!! Form::model($product,['url'=>'/cart','method'=>'DELETE'])!!}
        {!! Form::hidden('product_id',$product->id) !!}
        {!! Form::hidden('cart_id',$cart->id) !!}
        {!! Form::submit('Remove from Cart') !!}<br>
        {!! Form::close() !!}

        {!! Form::model($product,['url'=>'/cart','method'=>'PUT'])!!}
        {!! Form::hidden('product_id',$product->id) !!}
        {!! Form::hidden('cart_id',$cart->id) !!} <br>
        {!! Form::label('quantity', 'New Quantity')!!}
        {!! Form::selectRange('updated_quantity', 1, 10) !!}<br>
        {!! Form::submit('Update Quantity') !!}
        {!! Form::close() !!}

        <br>
        {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
        {!! Form::hidden('product_id',$product->id) !!}
        {!! Form::hidden('quantity',$product->quantity) !!}
        {!! Form::hidden('description',$product->description) !!}
        {!! Form::hidden('title',$product->title) !!}
        {!! Form::hidden('price',$product->price) !!}
        {!! Form::submit('Buy Now') !!}
        {!! Form::close() !!}

    </div>
</div>