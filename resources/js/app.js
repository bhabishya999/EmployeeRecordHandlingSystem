import "../css/app.css";
import "./bootstrap";

import routes from "@/routes";
import { createApp } from "vue";

createApp({}).use(routes).mount("#app");