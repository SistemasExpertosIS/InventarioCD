@extends('layouts.reportes')
@section('content')

<div class="container">
    <h4 style="text-align:center;">Reporte de Transportes</h4>
    <h5 style="text-align:center;">Fecha: {{date('Y-m-d')}}</h5>
    <h5 style="text-align:center;">Generado por: {{ $usuarioRegistrado->Name }}</h5>
    <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Id</th>                
                <th>Placa</th>
                <th>Id del Conductor</th>
                <th>Nombre del Conductor</th>
            </tr>

        </thead>
        <tbody>

            @foreach ($transportes as $transporte)
                <tr>
                    <td>{{$transporte->id}}</td>
                    <td>{{$transporte->Plate}}</td>
                    <td>{{$transporte->Drivername}}</td>
                    <td>{{$transporte->DriverIdentity}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        
</div>

@endsection   
