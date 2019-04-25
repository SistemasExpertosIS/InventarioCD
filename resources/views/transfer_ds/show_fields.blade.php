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


<!-- Traslado -->
<div class="form-group">
    {!! Form::label('idTransferM', 'Traslado:') !!}
    <p>{!! $trasladoM->Description !!}</p>
</div>

<!-- Caja -->
<div class="form-group">
    {!! Form::label('idBox', 'Caja:') !!}
    <p>{!! $caja->Description !!}</p>
</div>

<!-- Producto -->
<div class="form-group">
    {!! Form::label('idProduct', 'Producto:') !!}
    <p>{!! $producto->Name !!}</p>
</div>



