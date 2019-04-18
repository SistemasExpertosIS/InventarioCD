@extends('layouts.sindashboard')

@section('titulo', 'Página no encontrada')

@section('css')
    <link rel="stylesheet" href="css/personalizado.css">
@endsection

@section('content')
    <div class="contenedor text-center">
        <h1 style="font-size: 45px;"><b>STI - </b>Sistema de Control de Inventarios</h1>
        <br>
        <hr style="width: 87%;">
        <div class="no-encontrada">
            <h1>Página no encontrada</h1>
            <br>
            <h2> <a href="/" style="color: white;"> Ir al Inicio </a></h2>
        </div>
    </div>
@endsection