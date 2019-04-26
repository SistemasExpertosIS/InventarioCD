<!-- Descripción-->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Descripción:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tipo de movimiento -->
<div class="form-group col-sm-6">
    {!! Form::label('idMovementType', 'Tipo de movimiento:') !!}
    {!! Form::select('idMovementType', $tipoMovimiento, null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario recibe -->
<div class="form-group col-sm-6">
    {!! Form::label('idUserReceives', 'Usuario receptor:') !!}
    {!! Form::select('idUserReceives', $usuarios, null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario emisor -->
<div class="form-group col-sm-6">
    {!! Form::label('idUserSends', 'Usuario emisor:') !!}
    {!! Form::select('idUserSends', $usuarioR, null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal receptora -->
<div class="form-group col-sm-6">
    {!! Form::label('idBranchReceives', 'Sucursal receptora:') !!}
    {!! Form::select('idBranchReceives', $sucursales, null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal emisora -->
<div class="form-group col-sm-6">
    {!! Form::label('idBranchSends', 'Sucursal emisora:') !!}
    {!! Form::select('idBranchSends', $sucursales, null, ['class' => 'form-control']) !!}
</div>

<!-- Transporte -->
<div class="form-group col-sm-6">
    {!! Form::label('idTransport', 'Transporte:') !!}
    {!! Form::select('idTransport', $transportes, null, ['class' => 'form-control']) !!}
</div>
<!-- Estado -->
<div class="form-group col-sm-6">
    {!! Form::label('State', 'Estado:') !!}
    {!! Form::select('State', ['Pendiente' => 'Pendiente'], null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transferMs.index') !!}" class="btn btn-default">Cancelar</a>
</div>
