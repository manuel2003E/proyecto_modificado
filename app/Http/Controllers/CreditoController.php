<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CreditoController extends Controller
{
    public function index()
    {
        $creditos = Credito::with('cliente')->get();
        return view('creditos.index', compact('creditos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('creditos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'monto' => 'required|numeric',
            'interes' => 'required|numeric',
        ]);

        Credito::create($request->all());
        return redirect()->route('creditos.index')->with('success', 'Crédito creado exitosamente.');
    }

    public function edit(Credito $credito)
    {
        $clientes = Cliente::all();
        return view('creditos.edit', compact('credito', 'clientes'));
    }

    public function update(Request $request, Credito $credito)
    {
        $request->validate([
            'cliente_id' => 'required',
            'monto' => 'required|numeric',
            'interes' => 'required|numeric',
        ]);

        $credito->update($request->all());
        return redirect()->route('creditos.index')->with('success', 'Crédito actualizado exitosamente.');
    }

    public function show(Credito $credito)
    {
        return view('creditos.show', compact('credito'));
    }

    public function destroy(Credito $credito)
    {
        $credito->delete();
        return redirect()->route('creditos.index')->with('success', 'Crédito eliminado exitosamente.');
    }
}
