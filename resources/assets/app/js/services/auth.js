import {Jwt,User}   from "./resources";
import LocalStorage from "./localStorage";

const TOKEN = "token";
const USER = "user";

const afterLogin = (response) => {
    LocalStorage.set(TOKEN, response.data.token);

    User.get()
        .then((response) => {
            LocalStorage.setObject(USER, response.data);
        });
};

const afterLogout = () => {
    LocalStorage.remove(TOKEN);
    LocalStorage.remove(USER);
};

export default {
    login (email, password) {
        return Jwt.login(email, password)
            .then((response) => {
                afterLogin(response);

                return response;
            });
    },
    logout () {
        return Jwt.logout()
            .then(afterLogout())
            .catch(afterLogout());
    },
    getAuthorizationHeader () {
        return `Bearer ${LocalStorage.get(TOKEN)}`;
    },
    user () {
        return LocalStorage.getObject(USER);
    },
    check () {
        return LocalStorage.get(TOKEN) ? true : false;
    }
};
