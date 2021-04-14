import SessionsResource from "@/resources/sessions.resource"
import LocalStorage     from "@/services/localStorage"

const TOKEN = "token"

export default {
    get token () {
        return LocalStorage.get(TOKEN)
    },
    set token (value) {
        return value ? LocalStorage.set(TOKEN, value) : LocalStorage.remove(TOKEN)
    },
    getAuthorizationHeader () {
        return `Bearer ${this.token}`
    },
    refreshToken () {
        return SessionsResource.refreshToken()
            .then((response) => {
              this.token = response.data.token

              return response
            })
    },
    signIn (username, password) {
        return SessionsResource.signIn(username, password)
            .then((response) => {
              this.token = response.data.token

              return response
            })
    },
    signOut () {
        // TODO: rever o evento de sign out foi colocado o catch pois não possui a rota ainda
        return SessionsResource.signOut()
            .then((response) => {
                this.token = null

                return response
            })
            .catch((response) => {
                this.token = null

                return response
            })
    },
    signUp (username, password) {
        return SessionsResource.signUp(username, password)
            .then((response) => {
                this.token = response.data.token

                return response
            })
    }
}
