<!-- Cantidad -->
<div class="form-group col-sm-6">
    {!! Form::label('Quantity', 'Cantidad:') !!}
    {!! Form::number('Quantity', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Sucursal -->
<div class="form-group col-sm-6">
    {!! Form::label('idBranch', 'Sucursal:') !!}
    {!! Form::select('idBranch', $sucursales, null, ['class' => 'form-control']) !!}
</div>

<!-- Producto -->
<div class="form-group col-sm-6">
    {!! Form::label('idProduct', 'Producto:') !!}
    {!! Form::select('idProduct', $productos, null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo de movimiento -->
<div class="form-group col-sm-6">
    {!! Form::label('idMovementtype', 'Tipo de movimiento:') !!}
    {!! Form::select('idMovementtype', $tipoMovimiento, null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inventories.index') !!}" class="btn btn-default">Cancelar</a>
</div>
