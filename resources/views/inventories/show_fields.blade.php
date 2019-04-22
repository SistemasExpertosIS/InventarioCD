<!-- Id -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $inventory->id !!}</p>
</div>

<!-- Cantidad -->
<div class="form-group">
    {!! Form::label('Quantity', 'Cantidad:') !!}
    <p>{!! $inventory->Quantity !!}</p>
</div>

<!-- Sucursal -->
<div class="form-group">
    {!! Form::label('idBranch', 'Sucursal:') !!}
    <p>{!! $sucursal->Name !!}</p>
</div>

<!-- Producto -->
<div class="form-group">
    {!! Form::label('idProduct', 'Producto:') !!}
    <p>{!! $inventory->idProduct !!}</p>
</div>

<!-- Tipo de movimiento -->
<div class="form-group">
    {!! Form::label('idMovementtype', 'Tipo de movimiento:') !!}
    <p>{!! $inventory->idMovementtype !!}</p>
</div>


