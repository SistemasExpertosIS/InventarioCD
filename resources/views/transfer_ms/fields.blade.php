<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Idmovementtype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idMovementType', 'Idmovementtype:') !!}
    {!! Form::number('idMovementType', null, ['class' => 'form-control']) !!}
</div>

<!-- Iduserreceives Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idUserReceives', 'Iduserreceives:') !!}
    {!! Form::number('idUserReceives', null, ['class' => 'form-control']) !!}
</div>

<!-- Idusersends Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idUserSends', 'Idusersends:') !!}
    {!! Form::number('idUserSends', null, ['class' => 'form-control']) !!}
</div>

<!-- Idbranchreceives Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idBranchReceives', 'Idbranchreceives:') !!}
    {!! Form::number('idBranchReceives', null, ['class' => 'form-control']) !!}
</div>

<!-- Idbranchsends Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idBranchSends', 'Idbranchsends:') !!}
    {!! Form::number('idBranchSends', null, ['class' => 'form-control']) !!}
</div>

<!-- Idtransport Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idTransport', 'Idtransport:') !!}
    {!! Form::number('idTransport', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transferMs.index') !!}" class="btn btn-default">Cancel</a>
</div>
