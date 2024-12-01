import "./bootstrap";

import Alpine from "alpinejs";
import mask from "@alpinejs/mask";
import anchor from "@alpinejs/anchor";

window.Alpine = Alpine;
Alpine.plugin([mask, anchor]);
Alpine.start();
