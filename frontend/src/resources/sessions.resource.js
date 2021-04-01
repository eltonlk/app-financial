/* global Vue */

export default class SessionsResource {
    
    static accessToken (username, password) {
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

    static revokeToken () {
        return Vue.http.post("revoke_token")
    }

}
