@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Detalles del Cliente</h1>
        <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
        <p><strong>Contacto:</strong> {{ $cliente->contacto }}</p>
        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
