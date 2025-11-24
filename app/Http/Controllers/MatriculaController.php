<?php

namespace App\Http\Controllers;
use App\Models\Matricula;
use App\Models\Alumno;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    //
      public function index()
    {
        $matriculas = Matricula::with('alumno')->get();
        $alumnos = Alumno::all();

        return view('matriculas.index', compact('matriculas', 'alumnos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required',
            'periodo' => 'required',
            'telefono' => 'nullable',
            'fecha_matricula' => 'required|date',
            'estado' => 'required'
        ]);

        Matricula::create($request->all());
        return redirect()->route('matriculas.index');
    }

    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'alumno_id' => 'required',
            'periodo' => 'required',
            'telefono' => 'nullable',
            'fecha_matricula' => 'required|date',
            'estado' => 'required'
        ]);

        $matricula->update($request->all());
        return redirect()->route('matriculas.index');
    }
}
