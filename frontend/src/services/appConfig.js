const location = window.location

export default {

    get api_url () {
        return process.env.VUE_APP_ROOT_API
    },

    app_path: "/",

    get host () {
        return `${location.protocol}//${location.hostname}:${location.port}`
    },

    login_path: "#!/login",

    get login_url () {
        return `${this.host}${this.app_path}${this.login_path}`
    }
}
