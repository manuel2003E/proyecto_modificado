@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Pago</h2>
    <form action="{{ route('pagos.update', $pago->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="credito">Crédito:</label>
            <select name="credito_id" class="form-control" required>
                @foreach($creditos as $credito)
                    <option value="{{ $credito->id }}" {{ $pago->credito_id == $credito->id ? 'selected' : '' }}>
                        {{ $credito->monto_credito }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="monto_pago">Monto del Pago:</label>
            <input type="number" name="monto_pago" class="form-control" value="{{ $pago->monto_pago }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_pago">Fecha del Pago:</label>
            <input type="date" name="fecha_pago" class="form-control" value="{{ $pago->fecha_pago }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
