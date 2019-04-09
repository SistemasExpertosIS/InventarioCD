<!-- Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Plate', 'Plate:') !!}
    {!! Form::text('Plate', null, ['class' => 'form-control']) !!}
</div>

<!-- Drivername Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Drivername', 'Drivername:') !!}
    {!! Form::text('Drivername', null, ['class' => 'form-control']) !!}
</div>

<!-- Driveridentity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DriverIdentity', 'Driveridentity:') !!}
    {!! Form::text('DriverIdentity', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transports.index') !!}" class="btn btn-default">Cancel</a>
</div>
