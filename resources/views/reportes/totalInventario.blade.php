@extends('layouts.reportes')
@section('content')

<div class="container">
    <h4 style="text-align:center;">Total de inventario</h4>
    <h5 style="text-align:center;">Fecha: {{date('Y-m-d')}}</h5>
    <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Id</th>                
                <th>Cantidad</th>
                <th>Sucursal</th>
                <th>Producto</th>
            </tr>

        </thead>
        <tbody>

            @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{$inventario->Id}}</td>
                    <td>{{$inventario->Cantidad}}</td>
                    <td>{{$inventario->Sucursal}}</td>
                    <td>{{$inventario->Producto}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        
</div>

@endsection   
