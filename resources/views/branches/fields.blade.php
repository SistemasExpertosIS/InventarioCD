<!-- Nombre-->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Nombre:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Ciudad -->
<div class="form-group col-sm-6">
    {!! Form::label('City', 'Ciudad:') !!}
    {!! Form::text('City', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Abreviatura -->
<div class="form-group col-sm-6">
    {!! Form::label('Abv', 'Abreviatura:') !!}
    {!! Form::text('Abv', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Usuario -->
<div class="form-group col-sm-6">
    {!! Form::label('idUser', 'Usuario:') !!}
    <!--Se muestra el combobox con los usuarios disponibles para agregar-->
    {!! Form::select('idUser', $usuarios, null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('branches.index') !!}" class="btn btn-default">Cancelar</a>
</div>
