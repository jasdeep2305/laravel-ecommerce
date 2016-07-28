@extends('layouts.app')
@section('content')
    <ul class="list-group">

        <div class="container">
            <div class="form-group" >
                <label><a href="{{url('/products')}}">Continue Shopping</a> </label>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-heading" ALIGN="center"> <h3>Confirmation </h3></div>

                        <div class="panel-body">
                           <h4>Details of the product ordered</h4>
                            <br>

                            <li class="list-group-item">
                                <div class="row">
                                <div class="col-lg-3"><label>Product ID:</label>  </div>
                                <div class="col-lg-9">{{request('product_id')}}</div>  <br>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3"><label>Title:</label>  </div>
                                    <div class="col-lg-9">{{request('title')}}</div> <br>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3"><label>Product Description:</label></div>
                                    <div class="col-lg-9">{{request('description')}}</div> <br>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3"><label>Total Price:</label></div>
                                    <div class="col-lg-9">{{request('price')}}</div>
                                </div>
                                </li>
                            <br>
                            @include('order.form.confirmation')
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </ul>

@endsection