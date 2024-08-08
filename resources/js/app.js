import "../css/app.css"
import router from "./router";
import store from "./store"
import { createApp } from "vue";

import App from "./App.vue";

createApp(App).use(router).use(store).mount("#app");
