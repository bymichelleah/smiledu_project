<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docente;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        // traemos cursos y docentes para el select del modal
        $cursos = Curso::with('docente')->get();
        $docentes = Docente::orderBy('nombre')->get();
        return view('cursos.index', compact('cursos', 'docentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'creditos' => 'nullable|integer',
            'docente_id' => 'nullable|exists:docentes,id',
            'imagen' => 'nullable|string',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        Curso::create($request->only(['nombre','descripcion','creditos','docente_id','imagen','estado']));

        return redirect()->back()->with('success','Curso creado correctamente');
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'creditos' => 'nullable|integer',
            'docente_id' => 'nullable|exists:docentes,id',
            'imagen' => 'nullable|string',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        $curso->update($request->all());

        return redirect()->back()->with('success','Curso actualizado correctamente');
    }
    
}

