<!-- Name Field -->
<div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
    <p>{!! $user->Name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $user->password !!}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('State', 'State:') !!}
    <p>{!! $user->State !!}</p>
</div>

<!-- Rol Field -->
<div class="form-group">
    {!! Form::label('Rol', 'Rol:') !!}
    <p>{!! $user->Rol !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $user->deleted_at !!}</p>
</div>

