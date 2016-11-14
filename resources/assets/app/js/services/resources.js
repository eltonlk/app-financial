/* global Vue */

export class Jwt {
    static login (email, password) {
        return Vue.http.post("login", {
            email: email,
            password: password
        });
    }

    static logout () {
        return Vue.http.post("logout");
    }

    static refreshToken () {
        return Vue.http.post("refresh_token");
    }
}

let User = Vue.resource("user");

export {User};
