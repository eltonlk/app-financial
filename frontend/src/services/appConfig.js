const location = window.location

export default {

    get apiUrl () {
        return process.env.VUE_APP_ROOT_API
    },

    appPath: "/",

    get host () {
        return `${location.protocol}//${location.hostname}:${location.port}`
    },

    signInPath: "#!/sign_in",

    get SignInUrl () {
        return `${this.host}${this.appPath}${this.signInPath}`
    }
}
