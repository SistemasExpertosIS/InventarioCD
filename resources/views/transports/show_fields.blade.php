<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transport->id !!}</p>
</div>

<!-- Plate Field -->
<div class="form-group">
    {!! Form::label('Plate', 'Plate:') !!}
    <p>{!! $transport->Plate !!}</p>
</div>

<!-- Drivername Field -->
<div class="form-group">
    {!! Form::label('Drivername', 'Drivername:') !!}
    <p>{!! $transport->Drivername !!}</p>
</div>

<!-- Driveridentity Field -->
<div class="form-group">
    {!! Form::label('DriverIdentity', 'Driveridentity:') !!}
    <p>{!! $transport->DriverIdentity !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transport->created_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $transport->deleted_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transport->updated_at !!}</p>
</div>

