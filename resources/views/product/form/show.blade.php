<div class="row">
    <div class="col-md-4">

        {!! Form::model ($product,['method'=>'POST','url'=>'/cartproducts']) !!}
        {!! Form::hidden('product_id',$product->id) !!}
        {!! Form::label('quantity', 'Product Quantity')!!}
        {!! Form::selectRange('quantity', 1, 10) !!}
        {!! Form::hidden('description',$product->description) !!}
        {!! Form::hidden('title',$product->title) !!}
        {!! Form::hidden('price',$product->price) !!}
        <br>
        {!! Form::submit('Add To Cart') !!}
        {!! Form::close() !!}


        {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
        {!! Form::hidden('product_id',$product->id) !!}
        {!! Form::hidden('quantity','1') !!}
        {!! Form::hidden('description',$product->description) !!}
        {!! Form::hidden('title',$product->title) !!}
        {!! Form::hidden('price',$product->price) !!}
        <br>
        {!! Form::submit('Buy Now') !!}
        {!! Form::close() !!}

    </div>
</div>






