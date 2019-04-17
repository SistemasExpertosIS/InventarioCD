<!-- Descripción-->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Descripción:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo de movimiento -->
<div class="form-group col-sm-6">
    {!! Form::label('idMovementType', 'Tipo de movimiento:') !!}
    {!! Form::number('idMovementType', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario recibe -->
<div class="form-group col-sm-6">
    {!! Form::label('idUserReceives', 'Usuario receptor:') !!}
    {!! Form::number('idUserReceives', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario emisor -->
<div class="form-group col-sm-6">
    {!! Form::label('idUserSends', 'Usuario emisor:') !!}
    {!! Form::number('idUserSends', null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal receptora -->
<div class="form-group col-sm-6">
    {!! Form::label('idBranchReceives', 'Sucursal receptora:') !!}
    {!! Form::number('idBranchReceives', null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal emisora -->
<div class="form-group col-sm-6">
    {!! Form::label('idBranchSends', 'Sucursal emisora:') !!}
    {!! Form::number('idBranchSends', null, ['class' => 'form-control']) !!}
</div>

<!-- Transporte -->
<div class="form-group col-sm-6">
    {!! Form::label('idTransport', 'Transporte:') !!}
    {!! Form::number('idTransport', null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transferMs.index') !!}" class="btn btn-default">Cancelar</a>
</div>
