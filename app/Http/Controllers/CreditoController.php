<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use Illuminate\Http\Request;

class CreditoController extends Controller
{
    // Método para mostrar la lista de créditos
    public function index()
    {
        // Obtener todos los créditos de la base de datos
        $creditos = Credito::all();
        return view('creditos.index', compact('creditos'));
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        // Obtener todos los clientes para pasarlos a la vista
        $clientes = \App\Models\Cliente::all();
        return view('creditos.create', compact('clientes'));
    }

    // Método para almacenar el nuevo crédito
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto_credito' => 'required|numeric|min:0',
            'tasa_interes' => 'required|numeric|min:0',
            'dia_gracia' => 'required|integer|min:0',
            'dias_atraso' => 'required|integer|min:0',
            'estado_credito' => 'required|string|max:255',
        ]);

        // Calcular el monto de mora diario y total
        $monto_credito = $request->monto_credito;
        $tasa_interes = $request->tasa_interes;
        $dias_atraso = $request->dias_atraso;
        $monto_mora_diario = ($monto_credito * ($tasa_interes / 100)) / 30;
        $monto_total_mora = $monto_mora_diario * $dias_atraso;

        // Guardar el crédito en la base de datos
        $credito = new Credito();
        $credito->cliente_id = $request->cliente_id;
        $credito->monto_credito = $monto_credito;
        $credito->tasa_interes = $tasa_interes;
        $credito->dia_gracia = $request->dia_gracia;
        $credito->dias_atraso = $dias_atraso;
        $credito->monto_mora_diario = $monto_mora_diario;
        $credito->monto_total_mora = $monto_total_mora;
        $credito->estado_credito = $request->estado_credito;

        // Guardar en la base de datos
        $credito->save();
        return redirect()->route('creditos.index')->with('success', 'Crédito registrado exitosamente.');
    }

    // Método para mostrar los detalles de un crédito
    public function show($id)
    {
        $credito = Credito::findOrFail($id);
        return view('creditos.show', compact('credito'));
    }

    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        $credito = Credito::findOrFail($id);
        $clientes = \App\Models\Cliente::all();
        return view('creditos.edit', compact('credito', 'clientes'));
    }

    // Método para actualizar el crédito
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto_credito' => 'required|numeric|min:0',
            'tasa_interes' => 'required|numeric|min:0',
            'dia_gracia' => 'required|integer|min:0',
            'dias_atraso' => 'required|integer|min:0',
            'estado_credito' => 'required|string|max:255',
        ]);

        // Encontrar el crédito por ID y actualizar
        $credito = Credito::findOrFail($id);
        $credito->cliente_id = $request->cliente_id;
        $credito->monto_credito = $request->monto_credito;
        $credito->tasa_interes = $request->tasa_interes;
        $credito->dia_gracia = $request->dia_gracia;
        $credito->dias_atraso = $request->dias_atraso;
        
        // Calcular el monto de mora diario y total
        $monto_mora_diario = ($credito->monto_credito * ($credito->tasa_interes / 100)) / 30;
        $monto_total_mora = $monto_mora_diario * $credito->dias_atraso;
        
        $credito->monto_mora_diario = $monto_mora_diario;
        $credito->monto_total_mora = $monto_total_mora;
        $credito->estado_credito = $request->estado_credito;

        // Guardar los cambios
        $credito->save();
        return redirect()->route('creditos.index')->with('success', 'Crédito actualizado exitosamente.');
    }

    // Método para eliminar un crédito
    public function destroy($id)
    {
        // Encontrar el crédito por su ID
        $credito = Credito::findOrFail($id);
        
        // Eliminar el crédito
        $credito->delete();
        
        // Redirigir a la lista de créditos con un mensaje de éxito
        return redirect()->route('creditos.index')->with('success', 'Crédito eliminado exitosamente.');
    }
}