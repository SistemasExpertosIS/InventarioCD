<!-- Id -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transferD->id !!}</p>
</div>

<!-- Cantidad -->
<div class="form-group">
    {!! Form::label('Quantity', 'Cantidad:') !!}
    <p>{!! $transferD->Quantity !!}</p>
</div>

<!-- Estado -->
<div class="form-group">
    {!! Form::label('State', 'Estado:') !!}
    <p>{!! $transferD->State !!}</p>
</div>

<!-- Traslado -->
<div class="form-group">
    {!! Form::label('idTransferM', 'Traslado:') !!}
    <p>{!! $transferD->idTransferM !!}</p>
</div>

<!-- Caja -->
<div class="form-group">
    {!! Form::label('idBox', 'Caja:') !!}
    <p>{!! $transferD->idBox !!}</p>
</div>

<!-- Producto -->
<div class="form-group">
    {!! Form::label('idProduct', 'Producto:') !!}
    <p>{!! $transferD->idProduct !!}</p>
</div>



