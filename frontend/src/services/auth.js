import JwtToken         from "@/services/jwt-token"
import LocalStorage     from "@/services/localStorage"
import SessionsResource from "@/resources/sessions.resource"

const USER = "user"

const afterSignIn = function () {
    this.user.check = true

    SessionsResource.currentUser()
        .then((response) => {
            this.user.data = response.data
        })
}

const afterSignOut = function () {
    this.clear()
}

const afterSignUp = function () {
    this.user.check = true

    SessionsResource.currentUser()
        .then((response) => {
            this.user.data = response.data
        })
}

export default {
    clear () {
        this.user.data  = null
        this.user.check = false
    },
    signIn (username, password) {
        let afterSignInContext = afterSignIn.bind(this)

        return JwtToken.signIn(username, password)
            .then(afterSignInContext)
    },
    signOut () {
        let aftersignOutContext = afterSignOut.bind(this)

        return JwtToken.signOut()
            .then(aftersignOutContext)
            .catch(aftersignOutContext)
    },
    signUp (username, password) {
        let afterSignUpContext = afterSignUp.bind(this)

        return JwtToken.signUp(username, password)
            .then(afterSignUpContext)
    },
    user: {
        set data (value) {
            if (!value) {
                LocalStorage.remove(USER)

                this._data = null

                return
            }

            this._data = value

            LocalStorage.setObject(USER, value)
        },
        get data () {
            if (!this._data) {
                this._data = LocalStorage.getObject(USER)
            }

            return this._data
        },
        check: JwtToken.token ? true : false
    }
}
