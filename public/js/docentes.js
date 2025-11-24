// CREAR MODAL
document.getElementById("openCrearModal").onclick = () =>
    (document.getElementById("crearModal").style.display = "flex");

document.getElementById("closeCrearModal").onclick = () =>
    (document.getElementById("crearModal").style.display = "none");

// EDITAR MODAL
function openEditarModal(docente) {
    document.getElementById("editarModal").style.display = "flex";

    document.getElementById("edit_nombre").value = docente.nombre;
    document.getElementById("edit_especialidad").value = docente.especialidad;
    document.getElementById("edit_codigo").value = docente.codigo;
    document.getElementById("edit_estado").value = docente.estado;
    document.getElementById("edit_telefono").value = docente.telefono;

    document.getElementById("editarForm").action = "/docentes/" + docente.id;
}

document.getElementById("closeEditarModal").onclick = () =>
    (document.getElementById("editarModal").style.display = "none");
