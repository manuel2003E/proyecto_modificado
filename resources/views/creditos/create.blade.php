@extends('layout.app')

@section('content')
<div class="container">
    <h2>Registrar Crédito</h2>
    <form action="{{ route('creditos.store') }}" method="POST" id="creditoForm">
        @csrf
        
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" class="form-control" required>
                <option value="">Seleccionar Cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="monto_credito">Monto del Crédito:</label>
            <input type="number" name="monto_credito" class="form-control" id="monto_credito" required>
        </div>
        
        <div class="form-group">
            <label for="tasa_interes">Tasa de Interés (%):</label>
            <input type="number" name="tasa_interes" class="form-control" id="tasa_interes" required>
        </div>
        
        <div class="form-group">
            <label for="dia_gracia">Días de Gracia:</label>
            <input type="number" name="dia_gracia" class="form-control" id="dias_gracia" required>
        </div>
        
        <div class="form-group">
            <label for="dias_atraso">Días de Atraso:</label>
            <input type="number" name="dias_atraso" class="form-control" id="dias_atraso" required>
        </div>
        
        <div class="form-group">
            <label for="monto_mora_diario">Monto Mora Diario:</label>
            <input type="text" name="monto_mora_diario" class="form-control" id="monto_mora_diario" readonly>
        </div>

        <div class="form-group">
            <label for="monto_total_mora">Monto Total Mora:</label>
            <input type="text" name="monto_total_mora" class="form-control" id="monto_total_mora" readonly>
        </div>

        <div class="form-group">
            <label for="estado_credito">Estado del Crédito:</label>
            <select name="estado_credito" class="form-control" required>
                <option value="Activo">Activo</option>
                <option value="Finalizado">Finalizado</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Registrar Crédito</button>
    </form>
</div>

<script>
    const montoCreditoInput = document.getElementById('monto_credito');
    const tasaInteresInput = document.getElementById('tasa_interes');
    const diasGraciaInput = document.getElementById('dia_gracia');
    const diasAtrasoInput = document.getElementById('dias_atraso');
    const montoMoraDiarioInput = document.getElementById('monto_mora_diario');
    const montoTotalMoraInput = document.getElementById('monto_total_mora');

    function calcularMontoMora() {
        const montoCredito = parseFloat(montoCreditoInput.value) || 0;
        const tasaInteres = parseFloat(tasaInteresInput.value) || 0;
        const diasAtraso = parseFloat(diasAtrasoInput.value) || 0;

        // Calculo del monto mora diario
        const montoMoraDiario = (montoCredito * (tasaInteres / 100)) / 30; // Calcula el monto de mora diario
        montoMoraDiarioInput.value = montoMoraDiario.toFixed(2); // Muestra el resultado

        // Total de mora por días de atraso
        const totalMora = montoMoraDiario * diasAtraso; 
        montoTotalMoraInput.value = totalMora.toFixed(2); // Muestra el resultado
    }

    // Agrega event listeners para que el cálculo se realice al cambiar los valores
    montoCreditoInput.addEventListener('input', calcularMontoMora);
    tasaInteresInput.addEventListener('input', calcularMontoMora);
    diasAtrasoInput.addEventListener('input', calcularMontoMora);
</script>
@endsection
