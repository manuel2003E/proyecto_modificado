<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Credito;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('credito')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $creditos = Credito::all();
        return view('pagos.create', compact('creditos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'credito_id' => 'required',
            'monto' => 'required|numeric',
        ]);

        Pago::create($request->all());
        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente.');
    }

    public function edit(Pago $pago)
    {
        $creditos = Credito::all();
        return view('pagos.edit', compact('pago', 'creditos'));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'credito_id' => 'required',
            'monto' => 'required|numeric',
        ]);

        $pago->update($request->all());
        return redirect()->route('pagos.index')->with('success', 'Pago actualizado exitosamente.');
    }

    public function show(Pago $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado exitosamente.');
    }
}


