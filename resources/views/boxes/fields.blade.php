<!-- Cantidad -->
<div class="form-group col-sm-6">
    {!! Form::label('Quantity', 'Cantidad:') !!}
    {!! Form::number('Quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Descripción:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('boxes.index') !!}" class="btn btn-default">Cancelar</a>
</div>
