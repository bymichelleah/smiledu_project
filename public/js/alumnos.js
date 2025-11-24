// ============================
//      MODAL CREAR
// ============================

const crearModal = document.getElementById("crearModal");
const openCrearBtn = document.getElementById("openCrearModal");
const closeCrearBtn = document.getElementById("closeCrearModal");

if (openCrearBtn) {
    openCrearBtn.addEventListener("click", () => {
        crearModal.style.display = "flex";
    });
}

if (closeCrearBtn) {
    closeCrearBtn.addEventListener("click", () => {
        crearModal.style.display = "none";
    });
}

window.addEventListener("click", (e) => {
    if (e.target === crearModal) {
        crearModal.style.display = "none";
    }
});

// ============================
//      MODAL EDITAR
// ============================

const editarModal = document.getElementById("editarModal");
const closeEditarBtn = document.getElementById("closeEditarModal");

function openEditarModal(alumno) {
    editarModal.style.display = "flex";

    // Rellenar los inputs del modal editar
    document.getElementById("edit_nombre").value = alumno.nombre;
    document.getElementById("edit_apellido").value = alumno.apellido;
    document.getElementById("edit_dni").value = alumno.dni;
    document.getElementById("edit_codigo").value = alumno.codigo;
    document.getElementById("edit_grado").value = alumno.grado;
    document.getElementById("edit_seccion").value = alumno.seccion;
    document.getElementById("edit_telefono").value = alumno.telefono ?? "";
    document.getElementById("edit_estado").value = alumno.estado;

    // Cambiar la ruta del formulario PUT dinámicamente
    const form = document.getElementById("editarForm");
    form.action = `/alumnos/${alumno.id}`;
}

if (closeEditarBtn) {
    closeEditarBtn.addEventListener("click", () => {
        editarModal.style.display = "none";
    });
}

window.addEventListener("click", (e) => {
    if (e.target === editarModal) {
        editarModal.style.display = "none";
    }
});
