import JwtToken     from "./jwt-token";
import LocalStorage from "./localStorage";
import {User}       from "./resources";

const USER = "user";

export default {
    afterLogin () {
        User.get()
            .then((response) => {
                LocalStorage.setObject(USER, response.data);
            });
    },
    afterLogout () {
        this.clear();
    },
    check () {
        return JwtToken.token ? true : false;
    },
    clear () {
        LocalStorage.remove(USER);
    },
    login (email, password) {
        return JwtToken.accessToken(email, password)
            .then(this.afterLogin());
    },
    logout () {
        return JwtToken.revokeToken()
            .then(this.afterLogout())
            .catch(this.afterLogout());
    },
    user () {
        return LocalStorage.getObject(USER);
    }
};
