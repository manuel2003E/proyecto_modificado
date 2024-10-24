<!-- resources/views/creditos/edit.blade.php -->
@extends('layout.app')

@section('title', 'Editar Crédito')

@section('content')
<div class="container">
    <h1>Editar Crédito</h1>

    <form action="{{ route('creditos.update', $credito->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Asegúrate de usar el método PUT -->
        
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $credito->cliente_id == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="monto_credito">Monto Crédito</label>
            <input type="number" name="monto_credito" class="form-control" value="{{ $credito->monto_credito }}" required>
        </div>

        <div class="form-group">
            <label for="tasa_interes">Tasa de Interés</label>
            <input type="number" name="tasa_interes" class="form-control" value="{{ $credito->tasa_interes }}" required>
        </div>

        <div class="form-group">
            <label for="dia_gracia">Días de Gracia</label>
            <input type="number" name="dia_gracia" class="form-control" value="{{ $credito->dia_gracia }}" required>
        </div>

        <div class="form-group">
            <label for="dias_atraso">Días de Atraso</label>
            <input type="number" name="dias_atraso" class="form-control" value="{{ $credito->dias_atraso }}" required>
        </div>

        <div class="form-group">
            <label for="estado_credito">Estado de Crédito</label>
            <input type="text" name="estado_credito" class="form-control" value="{{ $credito->estado_credito }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Crédito</button>
        <a href="{{ route('creditos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
