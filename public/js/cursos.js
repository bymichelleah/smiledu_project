// Crear Modal
const crearModal = document.getElementById("crearModal");
const openCrearBtn = document.getElementById("openCrearModal");
const closeCrearBtn = document.getElementById("closeCrearModal");

if (openCrearBtn)
    openCrearBtn.addEventListener(
        "click",
        () => (crearModal.style.display = "flex")
    );
if (closeCrearBtn)
    closeCrearBtn.addEventListener(
        "click",
        () => (crearModal.style.display = "none")
    );
window.addEventListener("click", (e) => {
    if (e.target === crearModal) crearModal.style.display = "none";
});

// Editar Modal
const editarModal = document.getElementById("editarModal");
const closeEditarBtn = document.getElementById("closeEditarModal");

function openEditarModal(curso) {
    editarModal.style.display = "flex";
    document.getElementById("edit_nombre").value = curso.nombre;
    document.getElementById("edit_descripcion").value = curso.descripcion;
    document.getElementById("edit_creditos").value = curso.creditos;
    document.getElementById("edit_docente_id").value = curso.docente_id;
    document.getElementById("edit_imagen").value = curso.imagen;
    document.getElementById("edit_estado").value = curso.estado;

    // Cambiar la ruta del formulario PUT dinámicamente
    const form = document.getElementById("editarForm");
    form.action = `/cursos/${curso.id}`;
}

if (closeEditarBtn)
    closeEditarBtn.addEventListener(
        "click",
        () => (editarModal.style.display = "none")
    );
window.addEventListener("click", (e) => {
    if (e.target === editarModal) editarModal.style.display = "none";
});
