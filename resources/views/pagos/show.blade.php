@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Detalles del Pago</h1>
        <p><strong>Cliente:</strong> {{ $pago->credito->cliente->nombre }}</p>
        <p><strong>Monto:</strong> {{ $pago->monto }}</p>
        <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
