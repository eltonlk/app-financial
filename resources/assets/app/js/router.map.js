import DashboardComponent from "./components/Dashboard.vue";
import LoginComponent from "./components/Login.vue";
import LogoutComponent from "./components/Logout.vue";

export default {
    "/dashboard": {
        name: "dashboard",
        component: DashboardComponent
    },
    "/login": {
        name: "auth.login",
        component: LoginComponent
    },
    "/logout": {
        name: "auth.logout",
        component: LogoutComponent
    }
};
