@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}">

<h1 class="title">Cursos</h1>

<div class="banner">
    <img src="{{ asset('img/fijarcursos.png') }}">
    <p>Vista de Cursos, en la cual puedes visualizar todos los Cursos e interactuar.</p>
</div>

<button class="btn-crear" id="openCrearModal">
    Crear Curso <img src="{{ asset('img/add.png') }}">
</button><br>

<div class="cards-container">
    @foreach($cursos as $curso)
    <div class="course-card">
        <div class="card-header" style="background-image: url('{{ $curso->imagen ? asset($curso->imagen) : asset('img/cursofondo.png') }}')"></div>

        <div class="card-body">
            <h3>{{ $curso->nombre }}</h3>
            <p class="descripcion">{{ Str::limit($curso->descripcion, 90) }}</p>

            <p class="docente-name">{{ $curso->docente ? $curso->docente->nombre : 'Sin docente asignado' }}</p>

            <p>
                <span class="badge {{ strtolower($curso->estado) }}">{{ $curso->estado }}</span>
            </p>

            <button class="btn-editar" onclick="openEditarModal({{ $curso }})">
                Editar <img src="{{ asset('img/edit.png') }}">
            </button>
        </div>
    </div>
    @endforeach
</div>

{{-- MODAL CREAR --}}
<div class="modal" id="crearModal">
    <div class="modal-content">
        <h2>Crear Curso</h2>
        <span class="close" id="closeCrearModal">&times;</span>

        <form action="{{ route('cursos.store') }}" method="POST" class="curso-form">
            @csrf

            <label>Nombre</label>
            <input type="text" name="nombre" required>

            <label>Descripción</label>
            <textarea name="descripcion" rows="3"></textarea>

            <div class="form-row">
                <div class="form-group">
                    <label>Créditos</label>
                    <input type="number" name="creditos" min="0">
                </div>

                <div class="form-group">
                    <label>Docente</label>
                    <select name="docente_id">
                        <option value=""> Seleccionar</option>
                        @foreach($docentes as $doc)
                            <option value="{{ $doc->id }}">{{ $doc->nombre }} (#{{ $doc->codigo }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <label>Imagen (ruta pública en /public)</label>
            <input type="text" name="imagen" placeholder="ej: img/cursos/bg1.png">

            <label>Estado</label>
            <select name="estado" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>

            <button type="submit" class="btn-submit">Crear Curso <img src="{{ asset('img/save.png') }}"></button>
        </form>
    </div>
</div>

{{-- MODAL EDITAR --}}
<div class="modal" id="editarModal">
    <div class="modal-content">
        <h2>Editar Curso</h2>
        <span class="close" id="closeEditarModal">&times;</span>

        <form id="editarForm" method="POST" class="curso-form">
            @csrf
            @method('PUT')

            <label>Nombre</label>
            <input type="text" id="edit_nombre" name="nombre" required>

            <label>Descripción</label>
            <textarea id="edit_descripcion" name="descripcion" rows="3"></textarea>

            <div class="form-row">
                <div class="form-group">
                    <label>Créditos</label>
                    <input type="number" id="edit_creditos" name="creditos" min="0">
                </div>

                <div class="form-group">
                    <label>Docente</label>
                    <select id="edit_docente_id" name="docente_id">
                        <option value="">Seleccionar</option>
                        @foreach($docentes as $doc)
                            <option value="{{ $doc->id }}">{{ $doc->nombre }} (#{{ $doc->codigo }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <label>Imagen (ruta pública)</label>
            <input type="text" id="edit_imagen" name="imagen">

            <label>Estado</label>
            <select id="edit_estado" name="estado" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>

            <button type="submit" class="btn-submit">Actualizar Curso <img src="{{ asset('img/save.png') }}"></button>
        </form>
    </div>
</div>

<script src="{{ asset('js/cursos.js') }}"></script>
@endsection