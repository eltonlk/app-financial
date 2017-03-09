import JwtToken     from "./jwt-token";
import LocalStorage from "./localStorage";
import {User}       from "./resources";

const USER = "user";

export default {
    clear () {
        this.user.data  = null;
        this.user.check = false;
    },
    login (email, password) {
        let afterLogin = (response) => {
            this.user.check = true;

            User.get()
                .then((response) => {
                    this.user.data = response.data;
                });

            return response;
        };

        return JwtToken.accessToken(email, password)
            .then(afterLogin);
    },
    logout () {
        let afterLogout = (response) => {
            this.clear();

            return response;
        };

        return JwtToken.revokeToken()
            .then(afterLogout)
            .catch(afterLogout);
    },
    user: {
        set data (value) {
            if (!value) {
                LocalStorage.remove(USER);
                this._data = null;
                return;
            }
            this._data = value;
            LocalStorage.setObject(USER, value);
        },
        get data () {
            if (!this._data) {
                this._data = LocalStorage.getObject(USER);
            }
            return this._data;
        },
        check: JwtToken.token ? true : false
    }
};
