import Vue from 'vue'

export class Jwt {
  static accessToken (username, password) {
      return Vue.http.post("sign_in", {
          username: username,
          password: password
      })
  }

  static refreshToken () {
      return Vue.http.post("refresh_token");
  }

  // static revokeToken () {
  //     return Vue.http.post("revoke_token");
  // }
}

let BankAccounts = Vue.resource("bank_accounts{/id}")

export {BankAccounts}

let Tags = Vue.resource("tags{/id}")

export {Tags}
