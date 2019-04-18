@extends('layouts.sindashboard')

@section('titulo', 'Acceso no autorizado')

@section('css')
    <link rel="stylesheet" href="css/personalizado.css">
@endsection

@section('content')
    <div class="contenedor text-center">
        <h1 style="font-size: 45px;"><b>STI - </b>Sistema de Control de Inventarios</h1>
        <br>
        <hr style="width: 87%;">
        <div class="no-encontrada">
            <h1>Acceso no autorizado</h1>
            <br>
            <div class="links">
                <a class="link-ne" href="/"><i class="fa fa-home"></i> Ir al Inicio</a>
                <a class="link-ne" href="/login"><i class="fa fa-sign-in"></i> Iniciar sesión </a>
            </div>
        </div>
    </div>
@endsection