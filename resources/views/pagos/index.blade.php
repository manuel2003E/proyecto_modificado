@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Pagos</h1>
        <a href="{{ route('pagos.create') }}" class="btn btn-outline-primary">Agregar Pago</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->credito->cliente->nombre }}</td>
                        <td>{{ $pago->monto }}</td>
                        <td>
                            <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            <a href="{{ route('pagos.show', $pago->id) }}" class="btn btn-info">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
