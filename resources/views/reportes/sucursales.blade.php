@extends('layouts.reportes')
@section('content')

<div class="container">
    <h4 style="text-align:center;">Reporte de Sucursales</h4>
    <h5 style="text-align:center;">Fecha: {{date('Y-m-d')}}</h5>
    <h5 style="text-align:center;">Generado por: {{ $usuarioRegistrado->Name }}</h5>
    <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Id</th>                
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Abreviatura</th>
                <th>Usuario</th>
            </tr>

        </thead>
        <tbody>

            @foreach ($sucursales as $sucursal)
                <tr>
                    <td>{{$sucursal->id}}</td>
                    <td>{{$sucursal->Name}}</td>
                    <td>{{$sucursal->City}}</td>
                    <td>{{$sucursal->Abv}}</td>
                    <td>{{$sucursal->Usuario}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        
</div>

@endsection   
