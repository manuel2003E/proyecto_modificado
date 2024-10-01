@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Editar Pago</h1>
        <form action="{{ route('pagos.update', $pago->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="credito_id">Crédito</label>
                <select name="credito_id" class="form-control" required>
                    @foreach ($creditos as $credito)
                        <option value="{{ $credito->id }}" {{ $pago->credito_id == $credito->id ? 'selected' : '' }}>
                            {{ $credito->cliente->nombre }} - {{ $credito->monto }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" name="monto" class="form-control" value="{{ $pago->monto }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
