<ul class="list-group">
    <li class="list-group-item">
{!! Form::open(['url'=>'/products/'.$product->id,'method'=>'PUT','files'=>true]) !!}

    <div class="row">
            <div class="col-md-6">
                {!! Form::label('product_title', 'Product Title')!!}
                {!! Form::text ('product_title',$product->title,['class'=>'form-control']) !!}<br>
                {!! Form::label('product_description', 'Product Description')!!}
                {!! Form::text ('product_description',$product->description,['class'=>'form-control']) !!}<br>
                {!! Form::label('product_price', 'Product Price')!!}
                {!! Form::number ('product_price',$product->price,['class'=>'form-control']) !!}<br>
            </div>

            <div class ="col-md-6">
                {!! Form::label('product_image', 'Upload Product Image')!!}
                {!! Form::file('product_image') !!}<br>
                {!! Form::label('seller_id', 'Enter Seller Id')!!}
                {!! Form::number ('product_sellerid',$product->seller_id,['class'=>'form-control']) !!}<br>
                {!! Form::label('seller_name', 'Enter Seller Name')!!}
                {!! Form::text ('product_sellername',$product->seller_name,['class'=>'form-control']) !!}<br>
            </div>
    </div>
    {!! Form::submit('Update Product',['class'=>'btn btn-default','data-toggle'=>'tooltip',
    'data-placement'=>'top','title'=>'Update Product']) !!}
{!! Form::close() !!}
</li>
    </ul>
