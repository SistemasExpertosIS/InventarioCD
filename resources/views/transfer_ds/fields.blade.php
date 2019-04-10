<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Quantity', 'Quantity:') !!}
    {!! Form::text('Quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('State', 'State:') !!}
    {!! Form::text('State', null, ['class' => 'form-control']) !!}
</div>

<!-- Idtransferm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idTransferM', 'Idtransferm:') !!}
    {!! Form::number('idTransferM', null, ['class' => 'form-control']) !!}
</div>

<!-- Idbox Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idBox', 'Idbox:') !!}
    {!! Form::number('idBox', null, ['class' => 'form-control']) !!}
</div>

<!-- Idproduct Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idProduct', 'Idproduct:') !!}
    {!! Form::number('idProduct', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transferDs.index') !!}" class="btn btn-default">Cancel</a>
</div>
