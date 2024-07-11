import "./bootstrap";
import Weather from "./Components/Weather.vue";
import { createApp } from "vue";
import pinia from "./stores/pinia";

// Ensure you have a root element in your HTML with id="app"
const app = createApp(Weather);
app.use(pinia)
app.mount("#app");