<!-- Placa -->
<div class="form-group col-sm-6">
    {!! Form::label('Plate', 'Placa:') !!}
    {!! Form::text('Plate', null, ['class' => 'form-control']) !!}
</div>

<!-- Conductor -->
<div class="form-group col-sm-6">
    {!! Form::label('Drivername', 'Nombre del Conductor:') !!}
    {!! Form::text('Drivername', null, ['class' => 'form-control']) !!}
</div>

<!-- Conductor ID -->
<div class="form-group col-sm-6">
    {!! Form::label('DriverIdentity', 'ID del Conductor:') !!}
    {!! Form::text('DriverIdentity', null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transports.index') !!}" class="btn btn-default">Cancelar</a>
</div>
