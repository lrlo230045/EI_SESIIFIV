<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();
        return view('actividades.index', compact('actividades'));
    }
    public function disponibles()
    {
    $actividades = Actividad::all();
    return view('actividades.disponibles', compact('actividades'));
    }

    public function mis()
    {
        $actividades = auth()->user()->actividades;
        return view('actividades.mis', compact('actividades'));
    }
    public function create()
    {
        return view('actividades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cupo' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        Actividad::create($request->all());

        return redirect()->route('actividades.index')
            ->with('success','Actividad creada');
    }

    public function edit($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('actividades.edit', compact('actividad'));
    }

    public function update(Request $request, $id)
    {
        $actividad = Actividad::findOrFail($id);

        $actividad->update($request->all());

        return redirect()->route('actividades.index')
            ->with('success','Actualizado');
    }

    public function destroy($id)
    {
        Actividad::findOrFail($id)->delete();
        return back()->with('success','Eliminado');
    }
}