@extends('layout.app') 

@section('content')
<div class="container">
    <h2>Crear Cliente</h2>
    <form action="{{ route('clientes.store') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios." onkeypress="return /^[A-Za-z\s]*$/.test(event.key)">
        </div>
        <div class="form-group">
            <label for="dui">DUI:</label>
            <input type="text" name="dui" class="form-control" required pattern="\d{8}-\d" title="Formato: 12345678-9 (8 dígitos seguidos de un guion y un dígito)" onkeypress="return /^[0-9-]*$/.test(event.key)">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" class="form-control" required pattern=".+"
                   title="Este campo no puede estar vacío.">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" class="form-control" required pattern="\d{4}-\d{4}" 
                   title="Formato: 1234-5678 (4 dígitos, guion, 4 dígitos)" onkeypress="return /^[0-9-]*$/.test(event.key)">
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" class="form-control" required 
                   title="Por favor ingrese un correo electrónico válido.">
        </div>
        <div class="form-group">
            <label for="fecha_registro">Fecha Registro:</label>
            <input type="date" name="fecha_registro" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

<script>
function validateForm() {
    const nombre = document.querySelector('input[name="nombre"]');
    const dui = document.querySelector('input[name="dui"]');
    const telefono = document.querySelector('input[name="telefono"]');

    // Validar el nombre
    if (!/^[A-Za-z\s]+$/.test(nombre.value)) {
        alert("El nombre solo puede contener letras y espacios.");
        return false;
    }

    // Validar el DUI
    if (!/^\d{8}-\d$/.test(dui.value)) {
        alert("El DUI debe seguir el formato 12345678-9.");
        return false;
    }

    // Validar el teléfono
    if (!/^\d{4}-\d{4}$/.test(telefono.value)) {
        alert("El teléfono debe seguir el formato 1234-5678.");
        return false;
    }

    return true; // Si todas las validaciones pasan
}
</script>
@endsection