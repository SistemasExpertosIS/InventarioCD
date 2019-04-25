<!-- Id -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transferM->id !!}</p>
</div>

<!-- Descripción -->
<div class="form-group">
    {!! Form::label('Description', 'Descripción:') !!}
    <p>{!! $transferM->Description !!}</p>
</div>

<!-- Tipo de movimiento -->
<div class="form-group">
    {!! Form::label('idMovementType', 'Tipo de movimiento:') !!}
    <p>{!! $tipoMovimiento->Name !!}</p>
</div>

<!-- Usuario receptor -->
<div class="form-group">
    {!! Form::label('idUserReceives', 'Usuario receptor:') !!}
    <p>{!! $usuarioReceptor->Name !!}</p>
</div>

<!-- Usuario emisor -->
<div class="form-group">
    {!! Form::label('idUserSends', 'Usuario emisor:') !!}
    <p>{!! $usuarioEmisor->Name !!}</p>
</div>

<!-- Sucursal receptora -->
<div class="form-group">
    {!! Form::label('idBranchReceives', 'Sucursal receptora:') !!}
    <p>{!! $sucursalReceptora->Name !!}</p>
</div>

<!-- Sucursal emisora -->
<div class="form-group">
    {!! Form::label('idBranchSends', 'Sucursal emisora:') !!}
    <p>{!! $sucursalEmisora->Name !!}</p>
</div>

<!-- Transporte -->
<div class="form-group">
    {!! Form::label('idTransport', 'Transporte:') !!}
    <p>{!! $transporte->Plate !!}</p>
</div>


