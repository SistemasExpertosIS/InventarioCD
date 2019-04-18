<!-- Nombre -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Nombre:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo electrónico -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Correo electrónico:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Contraseña -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Estado -->
<div class="form-group col-sm-6">
    {!! Form::label('State', 'Estado:') !!}
    {!! Form::select('State', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control']) !!}
</div>

<!-- Rol -->
<div class="form-group col-sm-6">
    {!! Form::label('Rol', 'Rol:') !!}
    {!! Form::text('Rol', null, ['class' => 'form-control']) !!}
</div>

<!-- Guardar -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>
