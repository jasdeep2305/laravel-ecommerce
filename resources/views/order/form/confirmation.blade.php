{!! Form::open(['url'=>'/orders','method'=>'POST']) !!}

    {!! Form::hidden('product_id', request('product_id')) !!}
    {!! Form::hidden('totalprice',request('totalprice')) !!}
    {!! Form::hidden('quantity',request('quantity')) !!}
    {!! Form::label('Confirmation','Yes') !!}
        {!! Form::radio('confirmation','yes',true) !!}
    {!! Form::label('Confirmation','No') !!}
        {!! Form::radio('confirmation','no') !!}
    {!! Form::submit('Proceed') !!}

{!! Form::close() !!}