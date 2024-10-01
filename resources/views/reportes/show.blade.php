@extends('layout.app')

@section('title', 'Detalles del Reporte')

@section('content')
<div class="container">
    <h1>Detalles del Reporte</h1>
    <p><strong>Cliente:</strong> {{ $reporte->cliente->nombre }}</p>
    <p><strong>Crédito:</strong> {{ $reporte->credito->id }}</p>
    <p><strong>Monto Pagado:</strong> {{ $reporte->monto_pagado }}</p>
    <p><strong>Fecha de Pago:</strong> {{ $reporte->fecha_pago }}</p>
    <p><strong>Observaciones:</strong> {{ $reporte->observaciones }}</p>
    <a href="{{ route('reportes.edit', $reporte->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
