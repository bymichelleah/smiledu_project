<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
     protected $fillable = [
        'nombre',
        'codigo',
        'especialidad',
        'telefono',
        'estado',
        'foto',
    ];
}
