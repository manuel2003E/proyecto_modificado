@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Agregar Pago</h1>
        <form action="{{ route('pagos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="credito_id">Crédito</label>
                <select name="credito_id" class="form-control" required>
                    @foreach ($creditos as $credito)
                        <option value="{{ $credito->id }}">{{ $credito->cliente->nombre }} - {{ $credito->monto }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" name="monto" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
