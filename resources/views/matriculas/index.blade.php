@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/matriculas.css') }}">

<h1 class="title">Matrículas</h1>

<div class="banner">
    <img src="{{ asset('img/fijarmatriculas.png') }}">
    <p>Vista de Matrículas, en la cual puedes visualizar todas las matrículas e interactuar.</p>
</div>

<button class="btn-crear" id="openCrearModal">
    Crear Matrícula <img src="{{ asset('img/add.png') }}">
</button>

<br><br>

<div class="cards-container">
    @foreach($matriculas as $mat)
    <div class="mat-card">

        <div class="mat-header">
            <div>
                <h3>{{ $mat->alumno->nombre }} {{ $mat->alumno->apellido }}</h3>
                <span class="dni">{{ $mat->alumno->dni }}</span>
            </div>

            <img src="{{ asset('img/perfilmatricula.png') }}" class="avatar">
        </div>

        <p><strong>Periodo:</strong> {{ $mat->periodo }}</p>
        <p><strong>Teléfono:</strong> {{ $mat->telefono }}</p>
        <p><strong>Fecha de Matricula:</strong> {{ $mat->fecha_matricula }}</p>

        <p><strong>Estado:</strong>
            <span class="estado {{ strtolower($mat->estado) }}">
                {{ $mat->estado }}
            </span>
        </p>

        <button class="btn-editar" onclick='openEditarModal(@json($mat))'>
            Editar <img src="{{ asset('img/edit.png') }}">
        </button>
    </div>
    @endforeach
</div>

{{-- ========================== --}}
{{-- MODAL CREAR MATRÍCULA      --}}
{{-- ========================== --}}
<div class="modal" id="crearModal">
    <div class="modal-content">

        <h2>Crear Matrícula</h2>
        <span class="close" id="closeCrearModal">&times;</span>

        <form action="{{ route('matriculas.store') }}" method="POST" class="matricula-form">
            @csrf

            <label>Alumno</label>
            <select name="alumno_id" required>
                <option value="">Seleccionar</option>
                @foreach($alumnos as $al)
                    <option value="{{ $al->id }}">
                        {{ $al->nombre }} {{ $al->apellido }} ({{ $al->dni }})
                    </option>
                @endforeach
            </select>

            <label>Periodo</label>
            <input type="text" name="periodo" required>

            <label>Teléfono</label>
            <input type="text" name="telefono">

            <label>Fecha de Matrícula</label>
            <input type="date" name="fecha_matricula" required>

            <label>Estado</label>
            <select name="estado" required>
                <option value="Matriculado">Matriculado</option>
                <option value="Retirado">Retirado</option>
            </select>

            <button type="submit" class="btn-submit">
                Crear Matrícula <img src="{{ asset('img/save.png') }}">
            </button>
        </form>
    </div>
</div>


{{-- ========================== --}}
{{-- MODAL EDITAR MATRÍCULA     --}}
{{-- ========================== --}}
<div class="modal" id="editarModal">
    <div class="modal-content">

        <h2>Editar Matrícula</h2>
        <span class="close" id="closeEditarModal">&times;</span>

        <form id="editarForm" method="POST" class="matricula-form-editar">
            @csrf
            @method('PUT')

            <label>Alumno</label>
            <select name="alumno_id" id="edit_alumno_id">
                @foreach($alumnos as $al)
                    <option value="{{ $al->id }}">
                        {{ $al->nombre }} {{ $al->apellido }}
                    </option>
                @endforeach
            </select>

            <label>Periodo</label>
            <input type="text" id="edit_periodo" name="periodo">

            <label>Teléfono</label>
            <input type="text" id="edit_telefono" name="telefono">

            <label>Fecha de Matrícula</label>
            <input type="date" id="edit_fecha" name="fecha_matricula">

            <label>Estado</label>
            <select id="edit_estado" name="estado">
                <option value="Matriculado">Matriculado</option>
                <option value="Retirado">Retirado</option>
            </select>

            <button type="submit" class="btn-submit">
                Actualizar Matrícula <img src="{{ asset('img/save.png') }}">
            </button>
        </form>
    </div>
</div>

<script src="{{ asset('js/matriculas.js') }}"></script>

@endsection
