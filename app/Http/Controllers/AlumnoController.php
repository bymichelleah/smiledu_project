<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required|size:8|unique:alumnos',
            'codigo' => 'required|unique:alumnos',
            'grado' => 'required',
            'seccion' => 'required',
            'telefono' => 'nullable',
            'estado' => 'required'
        ]);

        Alumno::create($request->all());

        return redirect()->back()->with('success', 'Alumno creado correctamente');
    }

    public function update(Request $request, Alumno $alumno)
    {
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'creditos' => 'nullable|integer',
        'docente_id' => 'nullable|exists:docentes,id',
        'imagen' => 'nullable|string',
        'estado' => 'required|in:Activo,Inactivo',
    ]);

    $curso->update($request->only(['nombre','descripcion','creditos','docente_id','imagen','estado']));

    return redirect()->back()->with('success','Curso actualizado correctamente');
    }
}

