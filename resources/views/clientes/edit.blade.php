@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ $cliente->direccion }}" required>
            </div>
            <div class="form-group">
                <label for="contacto">Contacto</label>
                <input type="text" name="contacto" class="form-control" value="{{ $cliente->contacto }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
