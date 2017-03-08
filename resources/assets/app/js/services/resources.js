/* global Vue */

export class Jwt {
    static accessToken (email, password) {
        return Vue.http.post("access_token", {
            email: email,
            password: password
        });
    }

    static revokeToken () {
        return Vue.http.post("revoke_token");
    }

    static refreshToken () {
        return Vue.http.post("refresh_token");
    }
}

let BankAccount = Vue.resource("bank_accounts{/id}");

export {BankAccount};

let Bank = Vue.resource("banks");

export {Bank};

let User = Vue.resource("user");

export {User};
