import BankAccountsCreateComponent from "./components/bank_accounts/Create.vue";
import BankAccountsListComponent   from "./components/bank_accounts/List.vue";
import BankAccountsUpdateComponent from "./components/bank_accounts/Update.vue";
import BillPayCreateComponent      from "./components/bills/pays/Create.vue";
import BillPayUpdateComponent      from "./components/bills/pays/Update.vue";
import BillsPaysComponent          from "./components/bills/pays/List.vue";
import BillReceiveCreateComponent  from "./components/bills/receives/Create.vue";
import BillReceiveUpdateComponent  from "./components/bills/receives/Update.vue";
import BillsReceivesComponent      from "./components/bills/receives/List.vue";
import CategoriesCreateComponent   from "./components/categories/Create.vue";
import CategoriesListComponent     from "./components/categories/List.vue";
import CategoriesUpdateComponent   from "./components/categories/Update.vue";
import DashboardComponent          from "./components/Dashboard.vue";
import LoginComponent              from "./components/Login.vue";
import LogoutComponent             from "./components/Logout.vue";

export default {
    "/bank_accounts": {
        name: "bank_accounts",
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
    "/bills/pay/create": {
        name: "bill.pay.create",
        component: BillPayCreateComponent,
        auth: true
    },
    "/bills/pay/:id/update": {
        name: "bill.pay.update",
        component: BillPayUpdateComponent,
        auth: true
    },
    "/bills/pays": {
        name: "bills.pays",
        component: BillsPaysComponent,
        auth: true
    },
    "/bills/receive/create": {
        name: "bill.receive.create",
        component: BillReceiveCreateComponent,
        auth: true
    },
    "/bills/receive/:id/update": {
        name: "bill.receive.update",
        component: BillReceiveUpdateComponent,
        auth: true
    },
    "/bills/receives": {
        name: "bills.receives",
        component: BillsReceivesComponent,
        auth: true
    },
    "/categories": {
        name: "categories",
        component: CategoriesListComponent,
        auth: true
    },
    "/categories/create": {
        name: "category.create",
        component: CategoriesCreateComponent,
        auth: true
    },
    "/categories/:id/update": {
        name: "category.update",
        component: CategoriesUpdateComponent,
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
