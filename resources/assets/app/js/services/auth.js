import {Jwt,User}   from "./resources";
import LocalStorage from "./localStorage";

const TOKEN = "token";
const USER  = "user";

export default {
    check () {
        return LocalStorage.get(TOKEN) ? true : false;
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
        const afterLogout = () => {
            LocalStorage.remove(TOKEN);
            LocalStorage.remove(USER);
        };

        return Jwt.logout()
            .then(afterLogout())
            .catch(afterLogout());
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
