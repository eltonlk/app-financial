import appConfig from "./services/appConfig";

import Vue         from "vue";
import VueResource from "vue-resource";
import VueRouter   from "vue-router";

Vue.use(VueResource);
Vue.use(VueRouter);

// window._ = require("lodash");


// require("vue-resource");
// require("materialize-css");

require("./services/interceptors");

// To disable tips on console
// Vue.config.productionTip = false;

Vue.http.options.root = appConfig.api_url;

window.Vue = Vue;


import AppComponent from "./components/App.vue";
import Auth         from "./services/auth";
import RouterMap    from "./router.map";

const router = new VueRouter({
  RouterMap
});

router.beforeEach(({to, from, next}) => {
  console.log(from);

  if (to && to.auth && !Auth.user.check) {
    return router.go({ name: "auth.login" });
  }

  if (next) {
    next();
  }

});

// new Vue({
//   el: '#app',
//   router,
//   render: h => h(AppComponent)
// });

new Vue({
  router,
  render: h => h(AppComponent)
}).$mount('#app')
