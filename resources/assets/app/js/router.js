import AppComponent from "./components/App.vue";
import RouterMap from "./router.map";
import VueRouter from "vue-router";

const router = new VueRouter();

router.map(RouterMap);

router.start({
    components: {
        "app": AppComponent
    }
}, "body");
