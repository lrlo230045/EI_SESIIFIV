<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class InscripcionActividadController extends Controller
{
    public function inscribirse($id)
    {
        $actividad = Actividad::findOrFail($id);

        // evitar duplicados
        if(auth()->user()->actividades->contains($id)){
            return back()->with('warning','Ya estás inscrito');
        }

        // validar cupo
        if($actividad->users()->count() >= $actividad->cupo){
            return back()->with('error','Cupo lleno');
        }

        auth()->user()->actividades()->attach($id);

        return back()->with('success','Inscripción exitosa');
    }

    public function cancelar($id)
    {
        auth()->user()->actividades()->detach($id);

        return back()->with('success','Inscripción cancelada');
    }
}
