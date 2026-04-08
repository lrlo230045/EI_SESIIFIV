<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    //
    protected $table = 'talleres';
    
    protected $fillable = [
    'nombre',
    'descripcion',
    'cupo',
    'fecha_inicio',
    'fecha_fin',
    'activo'
    ];

    public function users()
{
    return $this->belongsToMany(\App\Models\User::class, 'inscripciones');
}
}
