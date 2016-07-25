{{--
To add the payment button
--}}



{!! Form::open(['url'=>'/payment/'.$order->id,'method'=>'POST']) !!}
    {!! Form::submit('Make Payment',['class'=>'btn btn-default','data-toggle'=>'tooltip',
    'data-placement'=>'top','title'=>'Pay']) !!}
{!! Form::close() !!}