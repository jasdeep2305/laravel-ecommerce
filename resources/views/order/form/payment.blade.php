{{--
To add the payment button
--}}



{!! Form::open(['url'=>'/payment/'.$order->id,'method'=>'POST']) !!}
    {!! Form::submit('Make Payment') !!}
{!! Form::close() !!}