@extends('layout.app')

@section('title', 'Inicio')

@section('content')
    <div class="jumbotron text-center">
        <h1>Bienvenido a la Plataforma de Gestión de Clientes, Créditos y Pagos</h1>
        <p class="lead">Administra de manera eficiente tus clientes, créditos y pagos.</p>
        <p class="lead">Desarrolladores de Software</p>
        <p class="lead"><i>Carlos Miguel y Manuel Alejandro </p>
        <p>Utiliza el menú superior para navegar a las diferentes secciones del sistema.</p>
        <a class="btn btn-outline-info" href="{{ route('clientes.index') }}" role="button">Ver Clientes</a>
        <a class="btn btn-outline-success" href="{{ route('creditos.index') }}" role="button">Ver Créditos</a>
        <a class="btn btn-outline-info" href="{{ route('pagos.index') }}" role="button">Ver Pagos</a>
        <a class="btn btn-outline-info" href="{{ route('reportes.index') }}" role="button">Ver Reportes</a>

    </div>
@endsection
