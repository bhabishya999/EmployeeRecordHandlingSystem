import "../css/app.css";
import "./axios";
import "./bootstrap";

import router from "@/routes";
import { createApp } from "vue";
createApp({}).use(router).mount("#app");
