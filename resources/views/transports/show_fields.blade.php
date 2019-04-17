<!-- Id -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transport->id !!}</p>
</div>

<!-- Placa -->
<div class="form-group">
    {!! Form::label('Plate', 'Placa:') !!}
    <p>{!! $transport->Plate !!}</p>
</div>

<!-- Conductor -->
<div class="form-group">
    {!! Form::label('Drivername', 'Nombre del Conductor:') !!}
    <p>{!! $transport->Drivername !!}</p>
</div>

<!-- Conductor ID -->
<div class="form-group">
    {!! Form::label('DriverIdentity', 'ID del Conductor:') !!}
    <p>{!! $transport->DriverIdentity !!}</p>
</div>

<!-- 
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transport->created_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $transport->deleted_at !!}</p>
</div>


<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transport->updated_at !!}</p>
</div> -->

