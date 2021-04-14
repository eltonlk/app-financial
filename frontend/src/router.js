/* global Vue */

import VueRouter from "vue-router"

Vue.use(VueRouter)

import AppComponent from "@/components/App.vue"
import Auth         from "@/services/auth"
import routes       from "@/routes"

const router = new VueRouter({
  routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.auth)) {
        if (!Auth.user.check) {
            next({ name: "sign_in" })
        } else {
            next()
        }
    } else {
        next()
    }
})

new Vue({
    router,
    el: '#app',
    render: h => h(AppComponent)
})
