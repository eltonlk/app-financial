/* global Vue */

export default class SessionsResource {

    static signIn (username, password) {
        return Vue.http.post("sign_in", {
            username: username,
            password: password
        })
    }

    static currentUser () {
        return Vue.http.get("current_user")
    }

    static refreshToken () {
        return Vue.http.post("refresh_token")
    }

    static signOut () {
        return Vue.http.post("sign_out")
    }

    static signUp (username, password) {
        return Vue.http.post("sign_up", {
            username: username,
            password: password
        })
    }

}
