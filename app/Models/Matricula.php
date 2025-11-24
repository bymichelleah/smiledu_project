<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
     protected $fillable = [
        'alumno_id',
        'periodo',
        'telefono',
        'fecha_matricula',
        'estado',
    ];
     public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
