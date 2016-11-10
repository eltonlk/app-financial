require("./bootstrap");

import AppComponent from "./components/App.vue";
import LoginComponent from "./components/Login.vue";

let VueRouter = require("vue-router");

const router = new VueRouter();

router.map({
    "/login": {
        name: "auth.login",
        component: LoginComponent
    }
});

router.start({
    components: {
        "app": AppComponent
    }
}, "body");
