<link rel="stylesheet" href="./css/alumnos.css">
<div class="modal" id="crearAlumnoModal">
    <div class="modal-content">

        <h2>Crear Alumno</h2>
        <span class="close" onclick="closeCrearAlumno()">&times;</span>

        <form action="{{ route('alumnos.store') }}" method="POST" class="alumno-form">
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
                    <input type="text" name="dni" required>
                </div>

                <div class="form-group">
                    <label>Código</label>
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

            <label>Teléfono</label>
            <input type="text" name="telefono">

            <label>Estado</label>
            <select name="estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>

            <button type="submit" class="btn-submit">
                Guardar Alumno <img src="{{ asset('img/save.png') }}">
            </button>

        </form>

    </div>
</div>
