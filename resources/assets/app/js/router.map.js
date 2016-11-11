import DashboardComponent from "./components/Dashboard.vue";
import LoginComponent from "./components/Login.vue";
import LogoutComponent from "./components/Logout.vue";

export default {
    "/dashboard": {
        name: "dashboard",
        component: DashboardComponent,
        auth: true
    },
    "/login": {
        name: "auth.login",
        component: LoginComponent,
        auth: false
    },
    "/logout": {
        name: "auth.logout",
        component: LogoutComponent,
        auth: true
    }
};
