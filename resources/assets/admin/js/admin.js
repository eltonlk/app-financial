require("./bootstrap");

Vue.component("admin-menu", require("./components/AdminMenu.vue"));
Vue.component("destroy-action", require("../../_default/js/components/DestroyAction.vue"));

const app = new Vue({
    el: "#app"
});
