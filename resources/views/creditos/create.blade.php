@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Agregar Crédito</h1>
        <form action="{{ route('creditos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" class="form-control" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" name="monto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="interes">Interés</label>
                <input type="number" name="interes" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('creditos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
