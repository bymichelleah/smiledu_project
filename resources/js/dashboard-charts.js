// resources/js/dashboard-charts.js
import { Chart, registerables } from "chart.js";
Chart.register(...registerables);

// --- Helper: colores (tus paleta) ---
const palette = {
    black: "#000000",
    white: "#FFFFFF",
    FFE0E6: "#FFE0E6",
    FFECD9: "#FFECD9",
    FFF5DD: "#FFF5DD",
    DBF2F2: "#DBF2F2",
    D7ECFB: "#D7ECFB",
    FFAABC: "#FFAABC",
    D1E9F9: "#D1E9F9",
    B4E5A6: "#B4E5A6",
    C2B1EF: "#C2B1EF",
};

// --- FUNC: crea el Bar Chart ---
function createBarChart(ctx, labels, data) {
    return new Chart(ctx, {
        type: "bar",
        data: {
            labels,
            datasets: [
                {
                    label: "Alumnos aprobados",
                    data,
                    backgroundColor: [
                        "rgba(255,224,230,0.9)", // usar colores suaves
                        "rgba(255,236,217,0.9)",
                        "rgba(255,245,221,0.9)",
                        "rgba(219,242,242,0.9)",
                        "rgba(215,236,251,0.9)",
                    ],
                    borderColor: "rgba(0,0,0,0.06)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 10 },
                },
            },
        },
    });
}

// --- FUNC: crea Doughnut Chart ---
function createDoughnutChart(ctx, labels, data) {
    return new Chart(ctx, {
        type: "doughnut",
        data: {
            labels,
            datasets: [
                {
                    data,
                    backgroundColor: [
                        palette.D1E9F9,
                        palette.FFAABC,
                        palette.B4E5A6,
                        palette.C2B1EF,
                    ],
                    hoverOffset: 8,
                },
            ],
        },
        options: {
            responsive: true,
            cutout: "45%",
            plugins: {
                legend: {
                    position: "top",
                    labels: { usePointStyle: true },
                },
            },
        },
    });
}

// --- Datos de ejemplo (fallback) ---
// Puedes reemplazar los arrays por datos traídos desde la API
const sampleBarLabels = ["2021", "2022", "2023", "2024", "2025"];
const sampleBarData = [25, 20, 44, 50, 60];

const sampleDoughnutLabels = ["Arte", "Comunicación", "Física", "Matemáticas"];
const sampleDoughnutData = [35, 25, 30, 10];

function initChartsWithData(payload) {
    // payload: { students_by_year: {labels:[], data:[]}, course_distribution: {labels:[], data:[] } }
    const barLabels = payload?.students_by_year?.labels ?? sampleBarLabels;
    const barData = payload?.students_by_year?.data ?? sampleBarData;

    const doughLabels =
        payload?.course_distribution?.labels ?? sampleDoughnutLabels;
    const doughData = payload?.course_distribution?.data ?? sampleDoughnutData;

    // Crear gráficos en DOM
    const barCtx = document.getElementById("barStudentsChart");
    const doughCtx = document.getElementById("doughnutCoursesChart");

    if (barCtx) createBarChart(barCtx, barLabels, barData);
    if (doughCtx) createDoughnutChart(doughCtx, doughLabels, doughData);
}

// --- Opción 1: Fetch a una API (recomendada para datos dinámicos) ---
async function fetchDashboardStats() {
    try {
        const res = await fetch("/api/dashboard-stats");
        if (!res.ok) throw new Error("Network response not ok");
        const payload = await res.json();
        // payload debe tener la forma:
        // { students_by_year: { labels: [...], data: [...] }, course_distribution: { labels: [...], data: [...] } }
        initChartsWithData(payload);
    } catch (err) {
        console.warn(
            "No se pudo obtener datos desde API, usando datos de ejemplo.",
            err
        );
        initChartsWithData(null);
    }
}

// Arrancar
document.addEventListener("DOMContentLoaded", () => {
    fetchDashboardStats();
});
