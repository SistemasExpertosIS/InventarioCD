<!-- Nombre -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Nombre:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Código -->
<div class="form-group col-sm-6">
    {!! Form::label('Code', 'Código:') !!}
    {!! Form::text('Code', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripción -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Descripción:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado -->
<div class="form-group col-sm-6">
    {!! Form::label('State', 'Estado:') !!}
    {!! Form::text('State', null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancelar</a>
</div>
