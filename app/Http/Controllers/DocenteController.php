<?php

namespace App\Http\Controllers;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    //
     public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }
     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:docentes',
            'especialidad' => 'required',
            'telefono' => 'nullable',
            'estado' => 'required',
        ]);

        Docente::create($request->all());

        return redirect()->back()->with('success', 'Docente creado correctamente');
    }
    public function update(Request $request, Docente $docente)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:docentes,codigo,' . $docente->id,
            'especialidad' => 'required',
            'telefono' => 'nullable',
            'estado' => 'required',
        ]);

        $docente->update($request->all());

        return redirect()->back()->with('success', 'Docente actualizado correctamente');
    }

}
