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
                <a class="btn btn-default update-quantity" data-product-id="{{$product->id}}" data-product-price="{{$product->price}}">Update Quantity</a>
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
        {{--{!! Form::model($product,['url'=>'/cart','method'=>'DELETE'])!!}--}}
        {{--{!! Form::hidden('product_id',$product->id) !!}--}}
        {{--{!! Form::hidden('cart_id',$cart->id) !!}--}}
        {{--{!! Form::submit('Remove from Cart',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Remove product from Cart']) !!}<br>--}}
        {{--{!! Form::close() !!}--}}

        <button type="button" class="btn btn-default"  title="Remove Product from Cart" data-toggle="modal" data-target="#removeFromCart">
            Remove from Cart
        </button>

        <!-- Modal -->
        <div class="modal fade" id="removeFromCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        Do you really want to remove this product ?
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::model($product,['url'=>'/cart','method'=>'DELETE'])!!}
                                {!! Form::hidden('product_id',$product->id) !!}
                                {!! Form::hidden('cart_id',$cart->id) !!}
                                {!! Form::submit('YES',['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Remove product from Cart']) !!}<br>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')

    <script>

        $(".update-quantity").on('click',function () {

            var product_id= $(this).data('product-id');
            var quantity = $('#updated_quantity').val();
            var price = $(this).data('product-price');
            var total_price= quantity * price;

//            console.log(product_id);
//            console.log(quantity);
//            console.log(price);
//            console.log(total_price);


            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },

                'url':'cart',
                'data':{
                    'product_id':product_id,
                    'quantity': quantity,
                    'price':total_price,

                },
                'type':'PUT'
            });

        });
    </script>
@endsection
