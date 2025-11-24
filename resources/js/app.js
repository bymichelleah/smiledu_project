import "./bootstrap";

import Alpine from "alpinejs";

// resources/js/app.js
import "./bootstrap"; // si lo tienes
// ...otras importaciones
import "./dashboard-charts.js"; // <-- nuevo archivo para los charts

window.Alpine = Alpine;

Alpine.start();
