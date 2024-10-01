@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Detalles del Crédito</h1>
        <p><strong>Cliente:</strong> {{ $credito->cliente->nombre }}</p>
        <p><strong>Monto:</strong> {{ $credito->monto }}</p>
        <p><strong>Interés:</strong> {{ $credito->interes }}</p>
        <a href="{{ route('creditos.edit', $credito->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('creditos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
