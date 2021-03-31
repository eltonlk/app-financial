// import config from "../config";

let config = {
    api_url: 'http://localhost:3000',
    app_path: "/",
    login_path: "#!/login"
};

const location = window.location;

let localConfig = {
    host: `${location.protocol}//${location.hostname}:${location.port}`,
    get login_url () {
        return `${this.host}${config.app_path}${config.login_path}`;
    }
};

const appConfig = Object.assign({}, config, localConfig);

export default appConfig;
