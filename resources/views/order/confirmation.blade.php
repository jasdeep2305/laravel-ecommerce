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
                            <br>



                                <li class="list-group-item">
                                    Product ID: {{request('product_id')}} <br>
                                    Title: {{request('title')}}<br>
                                    Product Description: {{request('description')}}<br>
                                    Total Price: {{request('price')}}
                                </li>


                            <br>
                            @include('order.form.confirmation')

                            <div class="form-group" >
                            <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
                        </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>


    </ul>

@endsection