/* global Vue */

export class Jwt {
    static login (email, password) {
        return Vue.http.post("login", {
            email: email,
            password: password
        });
    }
}
