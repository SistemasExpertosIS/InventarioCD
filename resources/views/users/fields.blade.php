<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Email', 'Email:') !!}
    {!! Form::email('Email', null, ['class' => 'form-control']) !!}
</div>

<!-- Pass Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pass', 'Pass:') !!}
    {!! Form::text('Pass', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('State', 'State:') !!}
    {!! Form::text('State', null, ['class' => 'form-control']) !!}
</div>

<!-- Rol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Rol', 'Rol:') !!}
    {!! Form::text('Rol', null, ['class' => 'form-control']) !!}
</div>

<!-- Create Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_time', 'Create Time:') !!}
    {!! Form::date('create_time', null, ['class' => 'form-control','id'=>'create_time']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#create_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Update Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('update_time', 'Update Time:') !!}
    {!! Form::date('update_time', null, ['class' => 'form-control','id'=>'update_time']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#update_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
