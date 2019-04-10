<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $inventory->id !!}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('Quantity', 'Quantity:') !!}
    <p>{!! $inventory->Quantity !!}</p>
</div>

<!-- Idbranch Field -->
<div class="form-group">
    {!! Form::label('idBranch', 'Idbranch:') !!}
    <p>{!! $inventory->idBranch !!}</p>
</div>

<!-- Idproduct Field -->
<div class="form-group">
    {!! Form::label('idProduct', 'Idproduct:') !!}
    <p>{!! $inventory->idProduct !!}</p>
</div>

<!-- Idmovementtype Field -->
<div class="form-group">
    {!! Form::label('idMovementtype', 'Idmovementtype:') !!}
    <p>{!! $inventory->idMovementtype !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $inventory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $inventory->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $inventory->deleted_at !!}</p>
</div>

