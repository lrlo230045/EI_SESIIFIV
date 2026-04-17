<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Actividad extends Model
{
    protected $table = 'actividades'; 

    protected $fillable = [
        'nombre',
        'descripcion',
        'cupo',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'inscripciones_actividades');
    }
}