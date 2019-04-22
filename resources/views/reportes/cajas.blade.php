@extends('layouts.reportes')
@section('content')

<div class="container">
    <h4 style="text-align:center;">Reporte de Cajas</h4>
    <h5 style="text-align:center;">Fecha: {{date('Y-m-d')}}</h5>
    <h5 style="text-align:center;">Generado por: {{ $usuarioRegistrado->Name }}</h5>
    <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Id</th>                
                <th>Cantidad</th>
                <th>Descripción</th>
            </tr>

        </thead>
        <tbody>

            @foreach ($cajas as $caja)
                <tr>
                    <td>{{$caja->id}}</td>
                    <td>{{$caja->Quantity}}</td>
                    <td>{{$caja->Description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        
</div>

@endsection   
