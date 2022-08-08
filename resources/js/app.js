import "../css/app.css";
import "./bootstrap";
import "./axios"

import router from "@/routes";
import { createApp } from "vue";

createApp({}).use(router).mount("#app");
