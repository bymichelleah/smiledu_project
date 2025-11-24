<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
        protected $fillable = [
        'nombre',
        'descripcion',
        'creditos',
        'docente_id',
        'imagen',
        'estado',
    ];

    public function docente()
    {
        return $this->belongsTo(\App\Models\Docente::class, 'docente_id');
    }
}
