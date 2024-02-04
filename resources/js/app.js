// import "./bootstrap";

//import "alpinejs";

// import focus from "@alpinejs/focus";
// Alpine.plugin(focus);

import "./bootstrap";
import Alpine from "alpinejs";
window.Alpine = Alpine;
//require("alpinejs");
import focus from "@alpinejs/focus";
//import Alpine from "alpinejs";
Alpine.plugin(focus);
Alpine.start();
