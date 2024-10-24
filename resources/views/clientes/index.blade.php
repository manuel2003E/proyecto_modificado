@extends('layout.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Lista de Clientes</h2>

    <!-- Botones Crear Cliente y Descargar PDF -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">Crear Cliente</a>
        <a href="{{ route('clientes.pdf') }}" class="btn btn-secondary">Descargar PDF</a>

    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Éxito!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-hover table-responsive">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>DUI</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->dui }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->fecha_registro }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <br></br>
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
        return confirm('¿Estás seguro de que deseas eliminar este cliente? Esta acción no se puede deshacer.');
    }
</script>

<style>
    /* Estilos personalizados para la tabla */
    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2); /* Sombra para efecto de profundidad */
        background-color: #f8f9fa; /* Fondo claro para la tabla */
    }
    .table th, .table td {
        vertical-align: middle;
        padding: 15px; /* Espaciado interno */
        font-size: 16px; /* Tamaño de fuente */
    }
    .table-hover tbody tr:hover {
        background-color: #e9ecef; /* Color de fondo al pasar el mouse */
    }
    .thead-dark {
        background-color: #343a40; /* Fondo oscuro para el encabezado */
        color: white; /* Color del texto del encabezado */
    }
    .btn-warning {
        background-color: #ffc107; /* Color del botón de editar */
        border: none; /* Sin borde */
    }
    .btn-danger {
        background-color: #dc3545; /* Color del botón de eliminar */
        border: none; /* Sin borde */
    }
    .btn-primary {
        background-color: #007bff; /* Color del botón de crear */
        border: none; /* Sin borde */
    }
    .btn-secondary {
        background-color: #6c757d; /* Color del botón de PDF */
        border: none; /* Sin borde */
    }
</style>
@endsection
