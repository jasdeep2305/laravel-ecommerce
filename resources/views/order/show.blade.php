

@extends('layouts.app')
@section('content')
    <ul class="list-group">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Products</div>

                        <div class="panel-body">
                            @foreach($order->products as $product)

                                <li class="list-group-item">
                                    Product ID: {{$product->id}} <br>
                                    Product Description: {{$product->description}}
                                    Seller Name: {{$product->seller_name}}
                                </li>

                            @endforeach
                            <form method="GET" action={{url('/products')}}>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Continue Shopping</button>

                                    </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </ul>
@stop