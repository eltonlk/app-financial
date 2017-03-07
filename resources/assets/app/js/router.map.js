import BankAccountsCreateComponent from "./components/bank_accounts/Create.vue";
import BankAccountsListComponent   from "./components/bank_accounts/List.vue";
import BankAccountsUpdateComponent from "./components/bank_accounts/Update.vue";
import DashboardComponent          from "./components/Dashboard.vue";
import LoginComponent              from "./components/Login.vue";
import LogoutComponent             from "./components/Logout.vue";

export default {
    "/bank_accounts": {
        name: "bank_account.list",
        component: BankAccountsListComponent,
        auth: true
    },
    "/bank_accounts/create": {
        name: "bank_account.create",
        component: BankAccountsCreateComponent,
        auth: true
    },
    "/bank_accounts/:id/update": {
        name: "bank_account.update",
        component: BankAccountsUpdateComponent,
        auth: true
    },
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
