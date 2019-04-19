<!-- Id -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $branch->id !!}</p>
</div>

<!-- Nombre -->
<div class="form-group">
    {!! Form::label('Name', 'Nombre:') !!}
    <p>{!! $branch->Name !!}</p>
</div>

<!-- Ciudad -->
<div class="form-group">
    {!! Form::label('City', 'Ciudad:') !!}
    <p>{!! $branch->City !!}</p>
</div>

<!-- Abreviatura -->
<div class="form-group">
    {!! Form::label('Abv', 'Abreviatura:') !!}
    <p>{!! $branch->Abv !!}</p>
</div>

<!-- Usuario -->
<div class="form-group">
    {!! Form::label('Name', 'Usuario:') !!}
    <!--Se muestra el nombre del usuario que nos devuelve el controlador-->
    <p>{!! $usuario->Name !!}</p>
</div>

<!-- Created
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $branch->created_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $branch->updated_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $branch->deleted_at !!}</p>
</div>-->

