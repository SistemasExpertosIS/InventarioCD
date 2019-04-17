<!-- Nombre -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Nombre:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Abreviatura -->
<div class="form-group col-sm-6">
    {!! Form::label('Abv', 'Abreviatura:') !!}
    {!! Form::text('Abv', null, ['class' => 'form-control']) !!}
</div>

<!-- Entrada -->
<div class="form-group col-sm-6">
    {!! Form::label('Entry', 'Entrada:') !!}
    {!! Form::text('Entry', null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('movementTypes.index') !!}" class="btn btn-default">Cancelar</a>
</div>
