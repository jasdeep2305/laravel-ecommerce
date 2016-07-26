{{--
To add the payment button
--}}



{{--{!! Form::open(['url'=>'/payment/'.$order->id,'method'=>'POST']) !!}--}}
    {{--{!! Form::submit('Make Payment',['class'=>'btn btn-default','data-toggle'=>'tooltip',--}}
    {{--'data-placement'=>'top','title'=>'Pay']) !!}--}}
{{--{!! Form::close() !!}--}}

<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
    Proceed to Pay
</button>


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
                <button type="button" class="btn btn-primary" onclick="location.href='/products';">Pay</button>
            </div>
        </div>
    </div>
</div>

