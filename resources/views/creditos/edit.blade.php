@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Editar Crédito</h1>
        <form action="{{ route('creditos.update', $credito->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
            <label for="cliente_id">Cliente</label>
                <select name="cliente_id" class="form-control" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $credito->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" name="monto" class="form-control" value="{{ $credito->monto }}" required>
            </div>
            <div class="form-group">
                <label for="interes">Interés</label>
                <input type="number" name="interes" class="form-control" value="{{ $credito->interes }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('creditos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

