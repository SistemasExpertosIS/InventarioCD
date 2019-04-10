<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('City', 'City:') !!}
    {!! Form::text('City', null, ['class' => 'form-control']) !!}
</div>

<!-- Abv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Abv', 'Abv:') !!}
    {!! Form::text('Abv', null, ['class' => 'form-control']) !!}
</div>

<!-- Iduser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idUser', 'Iduser:') !!}
    {!! Form::number('idUser', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('branches.index') !!}" class="btn btn-default">Cancel</a>
</div>
