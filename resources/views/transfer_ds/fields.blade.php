<!-- Cantidad -->
<div class="form-group col-sm-6">
    {!! Form::label('Quantity', 'Cantidad:') !!}
    {!! Form::number('Quantity', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Estado -->
<div class="form-group col-sm-6">
    {!! Form::label('State', 'Estado:') !!}
    {!! Form::select('State', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control']) !!}
</div>

<!-- Traslado -->
<div class="form-group col-sm-6">
    {!! Form::label('idTransferM', 'Traslado:') !!}
    {!! Form::number('idTransferM', null, ['class' => 'form-control']) !!}
</div>

<!-- Caja -->
<div class="form-group col-sm-6">
    {!! Form::label('idBox', 'Caja:') !!}
    {!! Form::number('idBox', null, ['class' => 'form-control']) !!}
</div>

<!-- Producto -->
<div class="form-group col-sm-6">
    {!! Form::label('idProduct', 'Producto:') !!}
    {!! Form::number('idProduct', null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transferDs.index') !!}" class="btn btn-default">Cancelar</a>
</div>
