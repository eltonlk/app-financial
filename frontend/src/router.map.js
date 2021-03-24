import Vue from 'vue';

// import BankAccountsCreateComponent  from "./components/bank_accounts/Create.vue";
// import BankAccountsListComponent    from "./components/bank_accounts/List.vue";
// import BankAccountsUpdateComponent  from "./components/bank_accounts/Update.vue";
import DashboardComponent       from "./components/Dashboard.vue";
// import SessionsLoginComponent       from "./components/sessions/Login.vue";
// import SessionsLogoutComponent      from "./components/sessions/Logout.vue";

let routes = [
  {
    name: 'redirect_to_root.index',
    path: '/',
    component: Vue.component('redirect-to-root', {
      beforeCreate() {
        this.$store.commit('SET_LOADING_STATUS_AS_LOADING');

        location.pathname = "/";
      },
      render: createElement => createElement()
    })
  },


  {
    name: 'dashboard',
    path: '/',
    component: DashboardComponent ,
    auth: true
  },


  { path: '*', redirect: '/' }
]

//   "/bank_accounts": {
//     name: "bank_accounts.list",
//     component: BankAccountsListComponent,
//     auth: true
//   },
//   "/bank_accounts/create": {
//     name: "bank_accounts.create",
//     component: BankAccountsCreateComponent,
//     auth: true
//   },
//   "/bank_accounts/:id/update": {
//     name: "bank_accounts.update",
//     component: BankAccountsUpdateComponent,
//     auth: true
//   },
//   "/dashboard": {
//     name: "dashboard",
//     component: DashboardShowComponent,
//     auth: true
//   },
//   "/login": {
//     name: "auth.login",
//     component: SessionsLoginComponent,
//     auth: false
//   },
//   "/logout": {
//     name: "auth.logout",
//     component: SessionsLogoutComponent,
//     auth: true
//   }
// };

export { routes };
