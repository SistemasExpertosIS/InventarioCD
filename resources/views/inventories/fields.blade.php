<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Quantity', 'Quantity:') !!}
    {!! Form::number('Quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Idbranch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idBranch', 'Idbranch:') !!}
    {!! Form::number('idBranch', null, ['class' => 'form-control']) !!}
</div>

<!-- Idproduct Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idProduct', 'Idproduct:') !!}
    {!! Form::number('idProduct', null, ['class' => 'form-control']) !!}
</div>

<!-- Idmovementtype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idMovementtype', 'Idmovementtype:') !!}
    {!! Form::number('idMovementtype', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inventories.index') !!}" class="btn btn-default">Cancel</a>
</div>
