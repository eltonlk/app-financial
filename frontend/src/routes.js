import BankAccountsCreateComponent from "@/components/bank_accounts/Create.vue"
import BankAccountsListComponent   from "@/components/bank_accounts/List.vue"
import BankAccountsUpdateComponent from "@/components/bank_accounts/Update.vue"
import DashboardComponent          from "@/components/Dashboard.vue"
import SessionsLoginComponent      from "@/components/sessions/Login.vue"
import SessionsLogoutComponent     from "@/components/sessions/Logout.vue"

let routes = [
    {
        redirect: '/',
        path: '*'
    },
    {
        component: BankAccountsListComponent,
        meta: {
            auth: true
        },
        name: "bank_accounts",
        path: "/bank_accounts"
    },
    {
        component: BankAccountsCreateComponent,
        meta: {
            auth: true
        },
        name: "bank_accounts.create",
        path: "/bank_accounts/create"
    },
    {
        component: BankAccountsUpdateComponent,
        meta: {
            auth: true
        },
        name: "bank_accounts.update",
        path: "/bank_accounts/:id/update"
    },
    {
        component: DashboardComponent,
        meta: {
            auth: true
        },
        name: "dashboard",
        path: '/'
    },
    {
        component: SessionsLoginComponent,
        meta: {
            auth: false
        },
        name: "login",
        path: "/login"
    },
    {
        component: SessionsLogoutComponent,
        meta: {
            auth: true
        },
        name: "logout",
        path: "/logout"
    }
]

export default routes
