@extends('layouts.reportes')
@section('content')

<div class="container">
    <h4 style="text-align:center;">Traslados</h4>
    <h5 style="text-align:center;">Fecha: {{date('Y-m-d')}}</h5>
    <!--<h5 style="text-align:center;">Generado por: {{ Auth::user()->name}}</h5>-->
    <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Id</th>                
                <th>Descripción</th>
                <th>Tipo de movimiento</th>
                <th>Usuario receptor</th>
                <th>Usuario emisor</th>
                <th>Sucursal receptora</th>
                <th>Sucursal emisora</th>
                <th>Transporte</th>
                <th>Cantidad</th>
                <th>Caja</th>
                <th>Producto</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($traslados as $traslado)
                <tr>
                    <td>{{$traslado->id}}</td>
                    <td>{{$traslado->Description}}</td>
                    <td>{{$traslado->TipoMovimiento}}</td>
                    <td>{{$traslado->UsuarioReceptor}}</td>
                    <td>{{$traslado->UsuarioEmisor}}</td>
                    <td>{{$traslado->SucursalReceptora}}</td>
                    <td>{{$traslado->SucursalEmisora}}</td>
                    <td>{{$traslado->Placa}}</td>
                    <td>{{$traslado->Cantidad}}</td>
                    <td>{{$traslado->Caja}}</td>
                    <td>{{$traslado->Producto}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        
</div>

@endsection   
