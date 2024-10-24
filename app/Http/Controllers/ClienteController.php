<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use PDF; // Usa el alias para domPDF
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function generatePDF()
    {
        // Obtener todos los clientes
        $clientes = Cliente::all();

        // Cargar la vista y pasar los datos
        $pdf = PDF::loadView('clientes.pdf', compact('clientes'));

        // Descargar el archivo PDF
        return $pdf->download('clientes.pdf');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dui' => 'required|string|regex:/^\d{8}-\d$/|unique:clientes',
            'direccion' => 'required|string',
            'telefono' => 'required|string|regex:/^\d{4}-\d{4}$/',
            'correo' => 'required|email|unique:clientes',
            'fecha_registro' => 'required|date',
        ]);

        Cliente::create($validated);
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dui' => 'required|string|regex:/^\d{8}-\d$/|unique:clientes,dui,' . $cliente->id,
            'direccion' => 'required|string',
            'telefono' => 'required|string|regex:/^\d{4}-\d{4}$/',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id,
            'fecha_registro' => 'required|date',
        ]);

        $cliente->update($validated);
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}