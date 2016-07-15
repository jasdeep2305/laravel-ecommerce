@extends('layouts.app')
@section('content')
    <ul class="list-group">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Confirmation </div>

                        <div class="panel-body">
                            Do you want to buy the following product?


                                <li class="list-group-item">
                                    Product ID: {{request('product_id')}} <br>
                                    Title: {{request('title')}}<br>
                                    Product Description: {{request('description')}}<br>
                                    Total Price: {{request('totalprice')}}
                                </li>
                                <form method="POST" action="{{url('/orders')}} ">
                                    {{csrf_field()}}
                                    <input type="hidden" name="product_id" value="{{request('product_id')}}">
                                    <input type="hidden" name="totalprice" value="{{request('totalprice')}}">
                                    <input type="hidden" name="quantity" value="{{request('quantity')}}" >

                                <div class="form-group">
                                    <input type="radio" name="confirmation" value="yes" checked>YES</input>
                                    <input type="radio" name="confirmation" value="no"> NO </input>
                                </div>
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-primary">Proceed</button>

                                    </div>
                                </form>


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

@endsection