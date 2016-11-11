import AppComponent from "./components/App.vue";
import Auth         from "./services/auth";
import RouterMap    from "./router.map";
import VueRouter    from "vue-router";


const router = new VueRouter();

router.map(RouterMap);

router.beforeEach(({to, next}) => {
    if (to.auth && !Auth.check()) {
        return router.go({ name: "auth.login" });
    }

    next();
});

router.start({
    components: {
        "app": AppComponent
    }
}, "body");
