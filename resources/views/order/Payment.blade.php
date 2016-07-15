@extends('layouts.app')
@section('content')
    <ul class="list-group">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Payment </div>

                        <div class="panel-body">
                            Make Payment here.. <br>

                            Total Price to pay: {{$details->bill_amount}}

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </ul>

@endsection