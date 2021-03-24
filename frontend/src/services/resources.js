import Vue         from 'vue'

export class Jwt {
  static accessToken (username, password) {
      return Vue.http.post("sessions/token", {
          username: username,
          password: password
      });
  }

  static refreshToken () {
      return Vue.http.post("sessions/token/refresh/");
  }

  static revokeToken () {
      return Vue.http.post("sessions/token/revoke");
  }
}

// let BankAccounts = Vue.resource("bank_accounts{/id}");

// export {BankAccounts};

// let User = Vue.resource("user");

// export {User};
