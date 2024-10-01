@extends('layout.app')

@section('title', 'Crear Reporte')

@section('content')
<div class="container">
    <h1>Crear Reporte</h1>
    <form action="{{ route('reportes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="credito_id">Crédito</label>
            <select name="credito_id" id="credito_id" class="form-control">
                @foreach($creditos as $credito)
                    <option value="{{ $credito->id }}">{{ $credito->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="monto_pagado">Monto Pagado</label>
            <input type="number" name="monto_pagado" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_pago">Fecha de Pago</label>
            <input type="date" name="fecha_pago" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Crear Reporte</button>
        <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
