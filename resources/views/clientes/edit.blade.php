@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Cliente</h2>
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="dui">DUI:</label>
            <input type="text" name="dui" class="form-control" value="{{ $cliente->dui }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" class="form-control" value="{{ $cliente->direccion }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" class="form-control" value="{{ $cliente->correo }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_registro">Fecha Registro:</label>
            <input type="date" name="fecha_registro" class="form-control" value="{{ $cliente->fecha_registro }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
