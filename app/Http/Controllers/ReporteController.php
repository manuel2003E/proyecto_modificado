<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Cliente;
use App\Models\Credito;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::with(['cliente', 'credito'])->get();
        return view('reportes.index', compact('reportes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $creditos = Credito::all();
        return view('reportes.create', compact('clientes', 'creditos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'credito_id' => 'required|exists:creditos,id',
            'monto_pagado' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

        Reporte::create($request->all());
        return redirect()->route('reportes.index')->with('success', 'Reporte creado correctamente.');
    }

    public function show($id)
    {
        $reporte = Reporte::with(['cliente', 'credito'])->findOrFail($id);
        return view('reportes.show', compact('reporte'));
    }

    public function edit($id)
    {
        $reporte = Reporte::findOrFail($id);
        $clientes = Cliente::all();
        $creditos = Credito::all();
        return view('reportes.edit', compact('reporte', 'clientes', 'creditos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'credito_id' => 'required|exists:creditos,id',
            'monto_pagado' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

        $reporte = Reporte::findOrFail($id);
        $reporte->update($request->all());
        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado correctamente.');
    }

    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();
        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado correctamente.');
    }
}
