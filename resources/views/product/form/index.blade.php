
@foreach($products as $product)
    <ul class="list-group">
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                  {!! Form::label('product_title', 'Product Title :')!!}
                </div>
                <div class="col-md-6">
                    {!! link_to('/products/'.$product->id, $title = $product->title, $attributes = ['title'], $secure = null) !!}
                    <br>
                </div>
            </div>
            {!! Form::model ($product,['method'=>'POST','url'=>'/cart']) !!} <br>
            <div class="row">
                <div class="col-md-4">
                    {!! Form::label('product_description', 'Product Description :')!!}
                    </div>
                <div class="col-md-6">
                    {!! Form::text ('description',null,['class'=>'form-control','readonly']) !!}
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {!! Form::label('quantity', 'Select Product Quantity : ')!!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectRange('quantity', 1, 10) !!}<br>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {!! Form::label('price', 'Product Price : ')!!}
                </div>
                <div class="col-md-6">
                    {!! Form::number ('price',null,['class'=>'form-control','readonly']) !!}<br>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {!! Form::hidden('product_id',$product->id) !!}
                    {!! Form::submit('Add To Cart',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Add A Product']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-md-6">
                    {!! Form::model($product,['url'=>'/orders/confirmation','method'=>'POST'])!!}
                    {!! Form::hidden('product_id',$product->id) !!}
                    {!! Form::hidden('quantity','1') !!}
                    {!! Form::hidden('description',$product->description) !!}
                    {!! Form::hidden('title',$product->title) !!}
                    {!! Form::hidden('price',$product->price) !!}
                    {!! Form::submit('Buy Now',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Buy Now']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-4">  

                    @if(Auth::check()&&Auth::user()->level_id<3)
                        {!! Form::model($product,['url'=>'/products/'.$product->id.'/edit','method'=>'GET']) !!}

                        {!! Form::hidden('product_id',$product->id) !!}
                        {!! Form::hidden('quantity',$product->quantity) !!}
                        {!! Form::hidden('description',$product->description) !!}
                        {!! Form::hidden('title',$product->title) !!}
                        {!! Form::hidden('price',$product->price) !!}
                        {!! Form::submit('Edit the Product',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Edit this Product']) !!}
                        {!! Form::close() !!}
                    @endif
                </div> 
                <div class="col-md-6">  
                    @if(Auth::check()&&Auth::user()->level_id<3)
                        {!! Form::model($product,['url'=>'/products/'.$product->id,'method'=>'DELETE']) !!}
                        {!! Form::submit('Delete the Product',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Delete this Product']) !!}
                        {!! Form::close() !!}

                    @endif
                </div>
                 </div>
            <br>

            </li>
        @endforeach
    </ul>
