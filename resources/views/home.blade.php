@extends('layout.app')

@section('title', 'Inicio')

@section('content')
<style>
    body {
        background-image: url('https://example.com/tu-imagen-de-fondo.jpg'); /* Cambia la URL a tu imagen */
        background-size: cover;
        background-position: center;
        color: white; /* Color del texto */
    }
    .content {
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
        padding: 50px;
        border-radius: 10px;
    }
    .h1{
        background-color: #0000;
    }
</style>

<div class="text-center content">
    <h1><b><i>Bienvenido al Sistema de Gestión de Créditos y Pagos</b></i></h1>
    <p><i>Utiliza el menú de navegación para gestionar clientes, créditos y pagos.</i></p>
    <hr>
    <br>
    <a href="{{ route('clientes.index') }}" class="btn btn-primary"><i>Gestionar Clientes</i></a>
    <a href="{{ route('creditos.index') }}" class="btn btn-success"><i>Gestionar Créditos</i></a>
    <a href="{{ route('pagos.index') }}" class="btn btn-info"><i>Gestionar Pagos</i></a>
</div>
@endsection