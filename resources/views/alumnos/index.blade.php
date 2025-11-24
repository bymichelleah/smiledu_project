@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/docentes.css') }}">

<h1 class="title">Alumnos</h1>

<div class="banner">
    <img src="{{ asset('img/fijaralumnos.png') }}">
    <p>Vista de Alumnos, en la cual puedes visualizar a todos los alumnos e interactuar.</p>
</div>

<button class="btn-crear" id="openCrearModal">
    Crear Alumno <img src="{{ asset('img/add.png') }}">
</button><br>

<div class="cards-docentes">

    @foreach($alumnos as $al)
    <div class="doc-card">

        <div class="doc-header">
            <div class="docente-display">
                <h3>{{ $al->nombre }} {{ $al->apellido }}</h3>
                <span>DNI: {{ $al->dni }}</span>
            </div>
            <img src="{{ asset('img/perfilalumno.png') }}" class="profile">
        </div>

        <p><strong>Código:</strong> {{ $al->codigo }}</p>
        <p><strong>Grado:</strong> {{ $al->grado }}</p>
        <p><strong>Sección:</strong> {{ $al->seccion }}</p>
        <p><strong>Teléfono:</strong> {{ $al->telefono }}</p>

        <p><strong>Estado:</strong>
            <span class="estado {{ strtolower($al->estado) }}">{{ $al->estado }}</span>
        </p>

        <button class="btn-editar" onclick="openEditarModal({{ $al }})">
            Editar <img src="{{ asset('img/edit.png') }}">
        </button>
    </div>
    @endforeach

</div>

{{-- ======================================
        MODAL CREAR ALUMNO
====================================== --}}
<div class="modal" id="crearModal">
    <div class="modal-content">
        <h2>Crear Alumno</h2>

        <span class="close" id="closeCrearModal">&times;</span>

        <form action="{{ route('alumnos.store') }}" method="POST" class="docente-form">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" required>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group">
                <label>DNI</label>
                <input type="text" name="dni" maxlength="8" required>
            </div>

            <div class="form-group">
                <label>Código de Alumno</label>
                <input type="text" name="codigo" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Grado</label>
                <input type="text" name="grado" required>
            </div>

            <div class="form-group">
                <label>Sección</label>
                <input type="text" name="seccion" required>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono">
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select name="estado" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn-submit">
            Crear Alumno <img src="{{ asset('img/save.png') }}">
        </button>

        </form>
    </div>
</div>

{{-- ======================================
        MODAL EDITAR ALUMNO
====================================== --}}
<div class="modal" id="editarModal">
    <div class="modal-content">

        <h2>Editar Alumno</h2>
        <span class="close" id="closeEditarModal">&times;</span>

        <form id="editarForm" method="POST" class="docente-form-editar">
            @csrf
            @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" id="edit_nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label>Apellido</label>
                <input type="text" id="edit_apellido" name="apellido" required>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group">
                <label>DNI</label>
                <input type="text" id="edit_dni" name="dni" maxlength="8" required>
            </div>

            <div class="form-group">
                <label>Código</label>
                <input type="text" id="edit_codigo" name="codigo" required>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group">
                <label>Grado</label>
                <input type="text" id="edit_grado" name="grado" required>
            </div>

            <div class="form-group">
                <label>Sección</label>
                <input type="text" id="edit_seccion" name="seccion" required>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" id="edit_telefono" name="telefono">
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select id="edit_estado" name="estado" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn-submit">
            Actualizar Alumno <img src="{{ asset('img/save.png') }}">
        </button>

        </form>

    </div>
</div>

<script src="{{ asset('js/alumnos.js') }}"></script>

@endsection


