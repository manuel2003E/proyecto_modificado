@extends('layout.app')

@section('content')
<div class="container">
    <h2>Registrar Pago</h2>
    <form action="{{ route('pagos.store') }}" method="POST">
        @csrf
        <div class="form-group">
    <label for="credito">Crédito:</label>
    <select name="credito_id" class="form-control" required>
    @foreach($creditos as $credito)
        <option value="{{ $credito->id }}">
            {{ $credito->cliente->nombre }} - Crédito: ${{ $credito->monto_credito }}
        </option>
    @endforeach
</select>

</div>
<div class="form-group">
    <label for="metodo_pago">Método de Pago:</label>
    <select name="metodo_pago" id="metodo_pago" class="form-control" required>
        <option value="" disabled selected>Seleccionar método de pago</option>
        <option value="Efectivo">Efectivo</option>
        <option value="Tarjeta">Tarjeta</option>
        <option value="Transferencia">Transferencia</option>
    </select>
</div>



        <div class="form-group">
            <label for="monto_pago">Monto del Pago:</label>
            <input type="number" name="monto_pago" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_pago">Fecha del Pago:</label>
            <input type="date" name="fecha_pago" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
