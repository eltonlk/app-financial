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
    accessToken (username, password) {
        return SessionsResource.accessToken(username, password)
            .then((response) => {
              this.token = response.data.token

              return response
            })
    },
    afterRekoveToken () {
        this.token = null
    },
    refreshToken () {
        return SessionsResource.refreshToken()
            .then((response) => {
              this.token = response.data.token

              return response
            });
    },
    revokeToken () {
        return SessionsResource.revokeToken()
            .then(this.afterRekoveToken())
            .catch(this.afterRekoveToken())
    },
    getAuthorizationHeader () {
        return `Bearer ${this.token}`
    }
}
