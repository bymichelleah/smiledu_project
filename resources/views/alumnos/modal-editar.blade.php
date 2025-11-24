<link rel="stylesheet" href="./css/alumnos.css">
<div class="modal" id="editarAlumnoModal">
    <div class="modal-content">

        <h2>Editar Alumno</h2>
        <span class="close" onclick="closeEditarAlumno()">&times;</span>

        <form id="editarAlumnoForm" method="POST" class="alumno-form-editar">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="edit_nombre">
                </div>

                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name="apellido" id="edit_apellido">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>DNI</label>
                    <input type="text" name="dni" id="edit_dni">
                </div>

                <div class="form-group">
                    <label>Código</label>
                    <input type="text" name="codigo" id="edit_codigo">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Grado</label>
                    <input type="text" name="grado" id="edit_grado">
                </div>

                <div class="form-group">
                    <label>Sección</label>
                    <input type="text" name="seccion" id="edit_seccion">
                </div>
            </div>

            <label>Teléfono</label>
            <input type="text" name="telefono" id="edit_telefono">

            <label>Estado</label>
            <select name="estado" id="edit_estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>

            <button type="submit" class="btn-submit">
                Actualizar Alumno <img src="{{ asset('img/save.png') }}">
            </button>

        </form>

    </div>
</div>
