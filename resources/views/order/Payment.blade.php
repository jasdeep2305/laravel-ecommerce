@extends('layouts.app')
@section('content')
    <ul class="list-group">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Payment</h3></div>

                        <div class="panel-body">
                           <label>Make Payment here..</label>  <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Total Price to pay:</label>
                                </div>
                                <div class="col-lg-9">
                                    {{$details->bill_amount}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </ul>

@endsection