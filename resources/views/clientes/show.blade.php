@extends('layout.app')

@section('content')
<div class="container">
    <h2>Detalles del Cliente</h2>
    <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
    <p><strong>DUI:</strong> {{ $cliente->dui }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    <p><strong>Correo:</strong> {{ $cliente->correo }}</p>
    <p><strong>Fecha Registro:</strong> {{ $cliente->fecha_registro }}</p>
    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
