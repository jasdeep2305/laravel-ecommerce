{!! Form::open(['url'=>'/orders','method'=>'POST']) !!}
{!! Form::hidden('product_id', request('product_id')) !!}
{!! Form::hidden('totalprice',request('totalprice')) !!}
{!! Form::hidden('quantity',request('quantity')) !!}
<div class="container" >
    <label>Do you want to buy the product? </label>
<div class="row" role="radiogroup">

    <div class="col-lg-2">
        {!! Form::label('Confirmation','Yes') !!}
        {!! Form::radio('confirmation','yes',true) !!}
    </div>
    <div class="col-lg-10">
        {!! Form::label('Confirmation','No') !!}
        {!! Form::radio('confirmation','no') !!}
    </div>
    <div class="row">

    </div>
    <div class="row" role="button">
        <div class="col-lg-2">
            {!! Form::submit('Proceed',['class'=>'btn btn-default','data-toggle'=>'tooltip',
    'data-placement'=>'top','title'=>'Proceed']) !!}
        </div>
    </div>

</div>
</div>

{!! Form::close() !!}