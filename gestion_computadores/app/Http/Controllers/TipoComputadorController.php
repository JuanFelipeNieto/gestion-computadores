<?php

namespace App\Http\Controllers;

use App\Models\TipoComputador;
use Illuminate\Http\Request;

class TipoComputadorController extends Controller
{
    // Mostrar lista de tipos
    public function index()
    {
        $tipos = TipoComputador::all();
        return view('tipos.index', compact('tipos'));
    }

    // Formulario de creación
    public function create()
    {
        return view('tipos.create');
    }

    // Guardar nuevo tipo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:tipo_computadores,nombre'
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'Ya existe un tipo con ese nombre.'
        ]);

        TipoComputador::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('tipos.index')
            ->with('success', 'Tipo registrado correctamente.');
    }

    // Formulario de edición
    public function edit(TipoComputador $tipo)
    {
        return view('tipos.edit', compact('tipo'));
    }

    // Actualizar tipo
    public function update(Request $request, TipoComputador $tipo)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:tipo_computadores,nombre,' . $tipo->id
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'Ya existe otro tipo con ese nombre.'
        ]);

        $tipo->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('tipos.index')
            ->with('success', 'Tipo actualizado correctamente.');
    }

    // Eliminar tipo
  public function destroy(TipoComputador $tipo)
{
    $tipo->delete();

    return redirect()->route('tipos.index')
        ->with('success', 'Tipo eliminado correctamente');
}

}
