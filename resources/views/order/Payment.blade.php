@extends('layouts.app')
@section('content')
    {{--<ul class="list-group">--}}

        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading"><h3>Payment</h3></div>--}}

                        {{--<div class="panel-body">--}}
                           {{--<label>Make Payment here..</label>  <br>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-lg-3">--}}
                                    {{--<label>Total Price to pay:</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-9">--}}
                                    {{--{{$details->bill_amount}}--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


    {{--</ul>--}}

    {{dd('hello')}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">PAYMENT GATEWAY</h4>
                </div>
                <div class="modal-body">
                    Make Payment here...
                    <br>
                    <label>Total Price to pay:</label>
                    {{--{{$details->bill_amount}}--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--...--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}















@endsection