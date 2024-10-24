@extends('layout.app')

@section('content')
<div class="container">
    <h2>Detalles del Pago</h2>
    <p><strong>Crédito:</strong> {{ $pago->credito->monto_credito }}</p>
    <p><strong>Monto del Pago:</strong> {{ $pago->monto_pago }}</p>
    <p><strong>Fecha del Pago:</strong> {{ $pago->fecha_pago }}</p>
    <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
