@extends('layout.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Lista de Créditos</h2>
    <a href="{{ route('creditos.create') }}" class="btn btn-success mb-3">Crear Crédito</a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Éxito!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-hover table-striped">
        <thead class="thead-custom">
            <tr>
                <th>Cliente</th>
                <th>Monto Crédito</th>
                <th>Tasa de Interés</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($creditos as $credito)
                <tr>
                    <td>{{ $credito->cliente->nombre }}</td>
                    <td>{{ number_format($credito->monto_credito, 2) }} USD</td>
                    <td>{{ $credito->tasa_interes }} %</td>
                    <td>
                        <a href="{{ route('creditos.show', $credito->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('creditos.edit', $credito->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('creditos.destroy', $credito->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar este crédito? Esta acción no se puede deshacer.');
    }
</script>

<style>
    /* Estilos personalizados para la tabla */
    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Sombra más intensa */
        background-color: #ffffff; /* Fondo blanco para la tabla */
    }
    .table th, .table td {
        vertical-align: middle;
        padding: 20px; /* Mayor espaciado interno */
        font-size: 16px; /* Tamaño de fuente */
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1; /* Color de fondo al pasar el mouse */
    }
    .thead-custom {
        background-color: #495057; /* Fondo gris oscuro para el encabezado */
        color: #ffffff; /* Color del texto del encabezado */
        text-transform: uppercase; /* Texto en mayúsculas */
        letter-spacing: 1px; /* Espaciado entre letras */
    }
    .btn-warning {
        background-color: #ffc107; /* Color del botón de editar */
        border: none; /* Sin borde */
    }
    .btn-danger {
        background-color: #dc3545; /* Color del botón de eliminar */
        border: none; /* Sin borde */
    }
    .btn-info {
        background-color: #17a2b8; /* Color del botón de ver */
        border: none; /* Sin borde */
    }
    .btn-success {
        background-color: #28a745; /* Color del botón de crear */
        border: none; /* Sin borde */
    }
    /* Estilos para botones al pasar el mouse */
    .btn:hover {
        opacity: 0.9; /* Efecto de opacidad al pasar el mouse */
    }
</style>
@endsection