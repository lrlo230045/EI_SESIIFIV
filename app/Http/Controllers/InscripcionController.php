<?php

namespace App\Http\Controllers;

use App\Models\Taller;

class InscripcionController extends Controller
{
    public function inscribirse($id)
    {
        $user = auth()->user();
        $taller = Taller::findOrFail($id);

        //  ya inscrito
        if ($user->talleres()->where('taller_id', $id)->exists()) {
            return back()->with('error', 'Ya estás inscrito');
        }

        //  cupo lleno
        if ($taller->users()->count() >= $taller->cupo) {
            return back()->with('error', 'Cupo lleno');
        }

        //  inscribir
        $user->talleres()->attach($id);

        return back()->with('success', 'Inscripción exitosa');
    }

    //  cancelar inscripción
    public function cancelar($id)
    {
        $user = auth()->user();
        $user->talleres()->detach($id);

        return back()->with('success', 'Inscripción cancelada');
    }
}