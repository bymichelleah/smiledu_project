<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
      protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'codigo',
        'grado',
        'seccion',
        'telefono',
        'estado'
    ];
}
