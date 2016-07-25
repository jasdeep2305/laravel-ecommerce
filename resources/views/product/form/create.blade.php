
{!! Form::open(['url'=>'/products','method'=>'POST','files'=>true]) !!}
    <div class="row">
        <div class="col-md-6">
            <br>
            {!! Form::label('product_title', 'Enter Product Title')!!}
            {!! Form::text ('product_title',null,['class'=>'form-control','placeholder'=>'Enter product title here']) !!}<br>
            {!! Form::label('product_description', 'Enter Product Description')!!}
            {!! Form::text ('product_description',null,['class'=>'form-control','placeholder'=>'Enter product description here']) !!}<br>
            {!! Form::label('product_price', 'Enter Product Price')!!}
            {!! Form::number ('product_price',null,['class'=>'form-control','placeholder'=>'Enter product price here']) !!}<br>
        </div>
        <div class="col-md-6">
            <br>
            {!! Form::label('seller_id', 'Enter Seller Id')!!}
            {!! Form::number ('product_sellerid',null,['class'=>'form-control','placeholder'=>'Enter Product seller id here']) !!}<br>
            {!! Form::label('seller_name', 'Enter Seller Name')!!}
            {!! Form::text ('product_sellername',null,['class'=>'form-control','placeholder'=>'Enter Product seller name here']) !!}<br>
            {!! Form::label('product_image', 'Upload Product Image')!!}
            {!! Form::file('product_image') !!}<br>
        </div>
    </div>
    {!! Form::submit('Add Product' ,['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Add New Product'])!!}
    {!! Form::close() !!}

