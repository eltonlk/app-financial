import Vue         from "vue"
import VueResource from "vue-resource"

Vue.use(VueResource)

import appConfig from "@/services/appConfig"
import Auth      from "@/services/auth"
import JwtToken  from "@/services/jwt-token"

// To disable tips on console
Vue.config.productionTip = false

// Set resource root api url
Vue.http.options.root = appConfig.apiUrl

Vue.http.interceptors.push((request) => {
    request.headers.set("Authorization", JwtToken.getAuthorizationHeader())
});

Vue.http.interceptors.push((request, next) => {
    next((response) => {
        if (response.status === 401) {
            return JwtToken.refreshToken()
                .then(() => {
                    return Vue.http(request)
                })
                .catch(() => {
                    Auth.clear()

                    window.location.href = appConfig.signInUrl
                })
        }
    })
})

// Set global
window.Vue = Vue
