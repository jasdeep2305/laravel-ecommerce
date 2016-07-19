<div class="row">
    <div class="col-md-4">

        @foreach($products as $product)
            <ul class="list-group">
                <li class="list-group-item">

                    {!! Form::label('product_title', 'Product Title:')!!}
                    {!! link_to('/products/'.$product->id, $title = $product->title, $attributes = ['title'], $secure = null) !!}
                    <BR>

                    {!! Form::model ($product,['method'=>'POST','url'=>'/cartproducts']) !!}
                    <br>
                    {!! Form::label('product_description', 'Product Description')!!}
                    {!! Form::text ('description',null,['class'=>'form-control','readonly']) !!}
                    <br>
                    {!! Form::label('quantity', 'Product Quantity')!!}
                    {!! Form::selectRange('quantity', 1, 10) !!}
                    <br>
                    {!! Form::label('price', 'Product Price')!!}
                    {!! Form::number ('price',null,['class'=>'form-control','readonly']) !!}
                    <br>
                    {!! Form::hidden('product_id',$product->id) !!}
                    {!! Form::submit('Add To Cart') !!}
                    {!! Form::close() !!}

                    {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}

                    {!! Form::hidden('product_id',$product->id) !!}
                    {!! Form::hidden('quantity','1') !!}
                    {!! Form::hidden('description',$product->description) !!}
                    {!! Form::hidden('title',$product->title) !!}
                    {!! Form::hidden('totalprice',$product->price) !!}
                    <br>
                    {!! Form::submit('Buy Now') !!}
                    {!! Form::close() !!}

                    <br>

                    @if(Auth::check()&&Auth::user()->level_id<3)

                        {!! Form::model($product,['url'=>'/products/'.$product->id.'/edit','method'=>'GET']) !!}

                        {!! Form::hidden('product_id',$product->id) !!}
                        {!! Form::hidden('quantity',$product->quantity) !!}
                        {!! Form::hidden('description',$product->description) !!}
                        {!! Form::hidden('title',$product->title) !!}
                        {!! Form::hidden('price',$product->price) !!}

                        {!! Form::submit('Edit the Product') !!}
                        {!! Form::close() !!}

                    @endif

                    <br>

                    @if(Auth::check()&&Auth::user()->level_id<3)

                        {!! Form::model($product,['url'=>'/products/'.$product->id,'method'=>'DELETE']) !!}
                        {!! Form::submit('Delete the Product') !!}
                        {!! Form::close() !!}

                    @endif

                    </li>

                @endforeach</ul>
    </div>
</div>
