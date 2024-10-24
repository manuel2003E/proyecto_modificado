@extends('layout.app')

@section('content')
<div class="container">
    <h2>Detalles del Crédito</h2>
    <p><strong>Cliente:</strong> {{ $credito->cliente->nombre }}</p>
    <p><strong>Monto del Crédito:</strong> {{ $credito->monto_credito }}</p>
    <p><strong>Tasa de Interés:</strong> {{ $credito->tasa_interes }}</p>
    <p><strong>Estado del Crédito:</strong> {{ $credito->estado_credito }}</p>
    <p><strong>Día de Gracia:</strong> {{ $credito->dia_gracia }}</p>
    <p><strong>Día de Atraso:</strong> {{ $credito->dia_atraso }}</p>
    <p><strong>Monto de Mora Diario:</strong> {{ $credito->monto_mora_diario }}</p>
    <a href="{{ route('creditos.edit', $credito->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('creditos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
