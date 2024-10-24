<?php 

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Credito;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        // Obtener todos los pagos junto con la información del crédito
        $pagos = Pago::with('credito')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        // Obtener todos los créditos para seleccionar en el formulario
        $creditos = Credito::with('cliente')->get(); // Incluimos la relación cliente para mostrar en el select
        return view('pagos.create', compact('creditos'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'credito_id' => 'required|exists:creditos,id',
            'monto_pago' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string', // Validar el método de pago
        ]);

        // Obtener el crédito y el cliente asociado
        $credito = Credito::find($request->credito_id);

        // Crear un nuevo pago
        Pago::create([
            'credito_id' => $request->credito_id,
            'cliente_id' => $credito->cliente_id,  // Guardamos el cliente_id del crédito asociado
            'monto_pago' => $request->monto_pago,
            'fecha_pago' => $request->fecha_pago,
            'metodo_pago' => $request->metodo_pago, // Guardamos el método de pago
        ]);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente.');
    }

    public function show($id)
    {
        // Obtener los detalles de un pago
        $pago = Pago::with('credito')->findOrFail($id);
        return view('pagos.show', compact('pago'));
    }

    public function edit($id)
    {
        // Obtener el pago y los créditos disponibles para editar
        $pago = Pago::findOrFail($id);
        $creditos = Credito::with('cliente')->get(); // Incluimos la relación cliente
        return view('pagos.edit', compact('pago', 'creditos'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos actualizados
        $request->validate([
            'credito_id' => 'required|exists:creditos,id',
            'monto_pago' => 'required|numeric',
            'fecha_pago' => 'required|date',
        ]);

        // Actualizar el pago
        $pago = Pago::findOrFail($id);
        $pago->update([
            'credito_id' => $request->credito_id,
            'cliente_id' => Credito::find($request->credito_id)->cliente_id, // Actualizamos cliente_id
            'monto_pago' => $request->monto_pago,
            'fecha_pago' => $request->fecha_pago,
        ]);

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Eliminar un pago
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente.');
    }
}
