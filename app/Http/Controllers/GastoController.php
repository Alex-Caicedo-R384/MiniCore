<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index(Request $request)
    {
        $gastos = Gasto::with(['empleado', 'departamento']);

        if ($request->has('fecha_inicio') && $request->has('fecha_fin')) {
            $gastos = $gastos->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin]);
        }

        $gastos = $gastos->get();
        $total_gastos = $gastos->sum('monto');

        return view('gastos.index', compact('gastos', 'total_gastos'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        $departamentos = Departamento::all();
        return view('gastos.create', compact('empleados', 'departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'empleado_id' => 'required|exists:empleados,id',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        Gasto::create($request->all());
        return redirect()->route('gastos.index')->with('success', 'Gasto registrado exitosamente.');
    }

    public function show(Gasto $gasto)
    {
        return view('gastos.show', compact('gasto'));
    }

    public function edit(Gasto $gasto)
    {
        $empleados = Empleado::all();
        $departamentos = Departamento::all();
        return view('gastos.edit', compact('gasto', 'empleados', 'departamentos'));
    }

    public function update(Request $request, Gasto $gasto)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'empleado_id' => 'required|exists:empleados,id',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $gasto->update($request->all());
        return redirect()->route('gastos.index')->with('success', 'Gasto actualizado exitosamente.');
    }

    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        return redirect()->route('gastos.index')->with('success', 'Gasto eliminado exitosamente.');
    }
}
