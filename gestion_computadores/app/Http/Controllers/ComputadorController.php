<?php

namespace App\Http\Controllers;

use App\Models\Computador;
use App\Models\TipoComputador;
use Illuminate\Http\Request;

class ComputadorController extends Controller
{
    public function index()
    {
        $computadores = Computador::with('tipo')->get();
        return view('computadores.index', compact('computadores'));
    }

    // Formulario de creación
    public function create()
    {
        $tipos = TipoComputador::all();
        return view('computadores.create', compact('tipos'));
    }

    // Guardar computador
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'ram_gb' => 'required|integer',
            'almacenamiento_gb' => 'required|integer',
            'precio' => 'required|numeric|min:0',   
            'tipo_id' => 'required|exists:tipo_computadores,id'
        ]);

        Computador::create($request->all());

        return redirect()->route('computadores.index')
            ->with('success', 'Computador registrado correctamente');
    }

    // Formulario para editar
    public function edit(Computador $computador)
    {
        $tipos = TipoComputador::all();
        return view('computadores.edit', compact('computador', 'tipos'));
    }

    // Actualizar computador
    public function update(Request $request, Computador $computador)
    {
        $request->validate([
            'marca' => 'required',
            'ram_gb' => 'required|integer',
            'almacenamiento_gb' => 'required|integer',
            'precio' => 'required|numeric|min:0',   // ← agregado
            'tipo_id' => 'required|exists:tipo_computadores,id'
        ]);

        $computador->update($request->all());

        return redirect()->route('computadores.index')
            ->with('success', 'Computador actualizado');
    }

    // Eliminar
    public function destroy(Computador $computador)
    {
        $computador->delete();

        return redirect()->route('computadores.index')
            ->with('success', 'Computador eliminado');
    }
}
