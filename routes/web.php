<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//AÑADIDAS
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth')->name('dashboard');
//DOCENTE
Route::middleware(['auth'])->group(function () {
    Route::get('/docentes', [DocenteController::class, 'index'])->name('docentes.index');
    Route::post('/docentes', [DocenteController::class, 'store'])->name('docentes.store');
    Route::put('/docentes/{docente}', [DocenteController::class, 'update'])->name('docentes.update');
});
// ALUMNOS
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::put('/alumnos/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
// CURSOS
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
Route::put('/cursos/{alumno}', [CursoController::class, 'update'])->name('cursos.update');
//MATRICULAS
Route::middleware(['auth'])->group(function () {
    Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas.index');
    Route::post('/matriculas', [MatriculaController::class, 'store'])->name('matriculas.store');
    Route::put('/matriculas/{matricula}', [MatriculaController::class, 'update'])->name('matriculas.update');
});


require __DIR__.'/auth.php';
