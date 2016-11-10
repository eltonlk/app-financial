import DashboardComponent from "./components/Dashboard.vue";
import LoginComponent from "./components/Login.vue";

export default {
    "/dashboard": {
        name: "dashboard",
        component: DashboardComponent
    },
    "/login": {
        name: "auth.login",
        component: LoginComponent
    }
};
