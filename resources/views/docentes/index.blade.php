@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="./css/docentes.css">
<h1 class="title">Docentes</h1>

<div class="banner">
    <img src="{{ asset('img/fijardocentes.png') }}">
    <p>Vista de Docentes, en la cual puedes visualizar a todos los Docentes e interactuar.</p>
</div>

<button class="btn-crear" id="openCrearModal">
    Crear Docente <img src="{{ asset('img/add.png') }}">
</button><br>

<div class="cards-docentes">

    @foreach($docentes as $doc)
    <div class="doc-card">

        <div class="doc-header">
            <div class="docente-display">
            <h3>{{ $doc->nombre }}</h3>
            <span>#{{ $doc->codigo }}</span>
            </div>
            <img src="{{ asset('img/perfildocente.png') }}" class="profile">
        </div>

        <p><strong>Especialidad:</strong> {{ $doc->especialidad }}</p>
        <p><strong>Teléfono:</strong> {{ $doc->telefono }}</p>

        <p><strong>Estado:</strong>
            <span class="estado {{ strtolower($doc->estado) }}">{{ $doc->estado }}</span>
        </p>

        <button class="btn-editar" onclick="openEditarModal({{ $doc }})">
            Editar <img src="{{ asset('img/edit.png') }}">
        </button>
    </div>
    @endforeach

</div>

{{-- MODAL CREAR --}}
<div class="modal" id="crearModal">
    <div class="modal-content">
        <h2>Crear Docente</h2>

        <span class="close" id="closeCrearModal">&times;</span>

        <form action="{{ route('docentes.store') }}" method="POST" class="docente-form">
    @csrf

    <div class="form-group">
        <label for="nombre">Docente</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="especialidad">Especialidad</label>
            <input type="text" id="especialidad" name="especialidad" required>
        </div>

        <div class="form-group">
            <label for="codigo">Código de Docente</label>
            <input type="text" id="codigo" name="codigo" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" required>
        </div>
    </div>

    <button type="submit" class="btn-submit">
        Crear Docente <img src="{{ asset('img/edit.png') }}" class="icon-pencil">
    </button>
</form>

    </div>
</div>

{{-- MODAL EDITAR --}}
<div class="modal" id="editarModal">
    <div class="modal-content">

        <div class="modal-header">
            <h2>Editar Docente</h2>
            <span class="close" id="closeEditarModal">&times;</span>
        </div>

        <form id="editarForm" method="POST" class="docente-form-editar">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit_nombre">Docente</label>
                <input type="text" name="nombre" id="edit_nombre" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="edit_especialidad">Especialidad</label>
                    <input type="text" name="especialidad" id="edit_especialidad" required>
                </div>

                <div class="form-group">
                    <label for="edit_codigo">Código</label>
                    <input type="text" name="codigo" id="edit_codigo" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="edit_estado">Estado</label>
                    <select name="estado" id="edit_estado" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edit_telefono">Teléfono</label>
                    <input type="text" name="telefono" id="edit_telefono" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                Actualizar Docente <img src="{{ asset('img/save.png') }}" class="icon-save">
            </button>

        </form>
    </div>
</div>

<script src="{{ asset('js/docentes.js') }}"></script>

@endsection
