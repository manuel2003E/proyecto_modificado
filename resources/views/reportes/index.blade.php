@extends('layout.app')

@section('title', 'Listado de Reportes')

@section('content')
<div class="container">
    <h1>Reportes</h1>
    <a href="{{ route('reportes.create') }}" class="btn btn-outline-dark">Crear Reporte</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Crédito</th>
                <th>Monto Pagado</th>
                <th>Fecha de Pago</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
            <tr>
                <td>{{ $reporte->id }}</td>
                <td>{{ $reporte->cliente->nombre }}</td>
                <td>{{ $reporte->credito->id }}</td>
                <td>{{ $reporte->monto_pagado }}</td>
                <td>{{ $reporte->fecha_pago }}</td>
                <td>
                    <a href="{{ route('reportes.show', $reporte->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('reportes.edit', $reporte->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('reportes.destroy', $reporte->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este reporte?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
