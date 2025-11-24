// --- CREAR ---
const crearModal = document.getElementById("crearModal");
const openCrearBtn = document.getElementById("openCrearModal");
const closeCrearBtn = document.getElementById("closeCrearModal");

if (openCrearBtn)
    openCrearBtn.addEventListener("click", () => {
        crearModal.style.display = "flex";
    });

if (closeCrearBtn)
    closeCrearBtn.addEventListener("click", () => {
        crearModal.style.display = "none";
    });

// --- EDITAR ---
const editarModal = document.getElementById("editarModal");
const closeEditarBtn = document.getElementById("closeEditarModal");

function openEditarModal(matricula) {
    console.log("Datos recibidos:", matricula); // <- importante

    editarModal.style.display = "flex";

    document.getElementById("edit_alumno_id").value = matricula.alumno_id;
    document.getElementById("edit_periodo").value = matricula.periodo;
    document.getElementById("edit_telefono").value = matricula.telefono;
    document.getElementById("edit_fecha").value = matricula.fecha_matricula;
    document.getElementById("edit_estado").value = matricula.estado;

    document.getElementById(
        "editarForm"
    ).action = `/matriculas/${matricula.id}`;
}

if (closeEditarBtn)
    closeEditarBtn.addEventListener("click", () => {
        editarModal.style.display = "none";
    });

window.addEventListener("click", (e) => {
    if (e.target === crearModal) crearModal.style.display = "none";
    if (e.target === editarModal) editarModal.style.display = "none";
});
