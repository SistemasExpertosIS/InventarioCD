<!-- Nombre -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Nombre:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Código -->
<div class="form-group col-sm-6">
    {!! Form::label('Code', 'Código:') !!}
    {!! Form::text('Code', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Descripción -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Descripción:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Estado -->
<div class="form-group col-sm-6">
    {!! Form::label('State', 'Estado:') !!}
    {!! Form::select('State', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancelar</a>
</div>
