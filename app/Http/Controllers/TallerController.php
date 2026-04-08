<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taller;

class TallerController extends Controller
{
    // LISTAR
    public function index()
    {
        $talleres = Taller::all();
        return view('talleres.index', compact('talleres'));
    }

    // FORM CREAR
    public function create()
    {
        return view('talleres.create');
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'cupo' => 'required|integer|min:1',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Taller::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cupo' => $request->cupo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'activo' => $request->has('activo'), //  IMPORTANTE
        ]);

        return redirect()->route('talleres.index')->with('success','Taller creado');
    }

    // EDITAR
    public function edit($id)
    {
        $taller = Taller::findOrFail($id);
        return view('talleres.edit', compact('taller'));
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $taller = Taller::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'cupo' => 'required|integer|min:1',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $taller->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cupo' => $request->cupo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'activo' => $request->has('activo'), //  IMPORTANTE
        ]);

        return redirect()->route('talleres.index')->with('success','Actualizado');
    }

    // ELIMINAR
    public function destroy($id)
    {
        Taller::findOrFail($id)->delete();
        return back()->with('success','Eliminado');
    }
    // VISTA USUARIOS
    public function userView()
    {
    $talleres = \App\Models\Taller::where('activo', true)->get();
    return view('talleres.user', compact('talleres'));
    }
    // MIS TALLERES
    public function misTalleres()
    {
        $talleres = auth()->user()->talleres;
        return view('talleres.mis', compact('talleres'));
    }
}