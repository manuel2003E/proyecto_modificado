@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Créditos</h1>
        <a href="{{ route('creditos.create') }}" class="btn btn-outline-info">Agregar Crédito</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Monto</th>
                    <th>Interés</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($creditos as $credito)
                    <tr>
                        <td>{{ $credito->cliente->nombre }}</td>
                        <td>{{ $credito->monto }}</td>
                        <td>{{ $credito->interes }}</td>
                        <td>
                            <a href="{{ route('creditos.edit', $credito->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('creditos.destroy', $credito->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            <a href="{{ route('creditos.show', $credito->id) }}" class="btn btn-info">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
