import JwtToken     from "./jwt-token";
import LocalStorage from "./localStorage";
import {User}       from "./resources";

const USER = "user";

const afterLogin = function () {
    this.user.check = true;

    User.get()
        .then((response) => {
            this.user.data = response.data;
        });
};

const afterLogout = function () {
    this.clear();
};

export default {
    clear () {
        this.user.data  = null;
        this.user.check = false;
    },
    login (email, password) {
        let afterLoginContext = afterLogin.bind(this);

        return JwtToken.accessToken(email, password)
            .then(afterLoginContext);
    },
    logout () {
        let afterLogoutContext = afterLogout.bind(this);

        return JwtToken.revokeToken()
            .then(afterLogoutContext)
            .catch(afterLogoutContext);
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
