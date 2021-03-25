import appConfig from "./services/appConfig";

import Vue         from "vue";
import VueResource from "vue-resource";

Vue.use(VueResource);

// require("./services/interceptors");

// To disable tips on console
Vue.config.productionTip = false;

// Set resource root api url
Vue.http.options.root = appConfig.api_url;

// Set global
window.Vue = Vue;
