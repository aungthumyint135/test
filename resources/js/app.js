import "./bootstrap";

import Alpine from "alpinejs";
import mask from "@alpinejs/mask";
import flatpickr from "flatpickr";
import anchor from "@alpinejs/anchor";
import Choices from "choices.js";
import Chart from "chart.js/auto";

window.Choices = Choices;
window.flatpickr = flatpickr;
window.Chart = Chart;

window.Alpine = Alpine;
Alpine.plugin([mask, anchor]);
Alpine.start();
