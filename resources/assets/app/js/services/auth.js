import {Jwt,User}   from "./resources";
import LocalStorage from "./localStorage";

const TOKEN = "token";
const USER  = "user";

export default {
    check () {
        return LocalStorage.get(TOKEN) ? true : false;
    },
    clearAuth () {
        LocalStorage.remove(TOKEN);
        LocalStorage.remove(USER);
    },
    getAuthorizationHeader () {
        return `Bearer ${LocalStorage.get(TOKEN)}`;
    },
    login (email, password) {
        return Jwt.login(email, password)
            .then((response) => {
                LocalStorage.set(TOKEN, response.data.token);

                User.get()
                    .then((response) => {
                        LocalStorage.setObject(USER, response.data);
                    });

                return response;
            });
    },
    logout () {
        return Jwt.logout()
            .then(this.clearAuth())
            .catch(this.clearAuth());
    },
    refreshToken () {
        return Jwt.refreshToken()
            .then((response) => {
                LocalStorage.set(TOKEN, response.data.token);

                return response;
            });
    },
    user () {
        return LocalStorage.getObject(USER);
    }
};
