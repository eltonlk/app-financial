import {Jwt}        from "./resources";
import LocalStorage from "./localStorage";

const TOKEN = "token";

export default {
    get token () {
        return LocalStorage.get(TOKEN);
    },
    set token (value) {
        return value ? LocalStorage.set(TOKEN, value) : LocalStorage.remove(TOKEN);
    },
    accessToken (email, password) {
        return Jwt.accessToken(email, password)
            .then((response) => {
              this.token = response.data.token;
              return response;
            });
    },
    afterRekoveToken () {
        this.token = null;
    },
    refreshToken () {
        return Jwt.refreshToken()
            .then((response) => {
              this.token = response.data.token;
              return response;
            });
    },
    revokeToken () {
        return Jwt.revokeToken()
            .then(this.afterRekoveToken())
            .catch(this.afterRekoveToken());
    },
    getAuthorizationHeader () {
        return `Bearer ${this.token}`;
    }
}
