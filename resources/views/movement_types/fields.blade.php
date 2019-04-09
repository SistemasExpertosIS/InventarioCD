<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Abv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Abv', 'Abv:') !!}
    {!! Form::text('Abv', null, ['class' => 'form-control']) !!}
</div>

<!-- Entry Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Entry', 'Entry:') !!}
    {!! Form::text('Entry', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('movementTypes.index') !!}" class="btn btn-default">Cancel</a>
</div>
