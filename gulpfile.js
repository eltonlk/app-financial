const gulp             = require("gulp");
const elixir           = require("laravel-elixir");
const webpack          = require("webpack");
const WebpackDevServer = require("webpack-dev-server");
const webpackConfig    = require("./webpack.config");
const webpackDevConfig = require("./webpack.dev.config");
const mergeWebpack     = require("webpack-merge");
const env              = require("gulp-env");
const stringifyObject  = require("stringify-object");
const file             = require("gulp-file");

const HOST = "0.0.0.0";

// require("laravel-elixir-vue");
// require("laravel-elixir-webpack-official");

// Elixir.webpack.config.module.loaders = [];

// Elixir.webpack.mergeConfig(webpackConfig);
// Elixir.webpack.mergeConfig(webpackDevConfig);

gulp.task("app-config", () => {
    env({
        file: ".env",
        type: "ini"
    });

    let appConfig = require("./app.config");
    let string    = stringifyObject(appConfig);

    return file("config.js", `module.exports = ${string};`, { src: true })
        .pipe(gulp.dest("./resources/assets/app/js"));
});

gulp.task("webpack-dev-server", () => {
    let config = mergeWebpack(webpackConfig, webpackDevConfig);
    let inlineHot = [
        "webpack/hot/dev-server",
        `webpack-dev-server/client?http://${HOST}:8080`
    ];

    config.entry.admin = [ config.entry.admin ].concat(inlineHot);
    config.entry.app = [ config.entry.app ].concat(inlineHot);

    new WebpackDevServer(webpack(config), {
        hot: true,
        proxy: {
            "*": `http://${HOST}:8000`
        },
        watchOptions: {
            poll: true,
            aggregateTimeout: 300
        },
        publicPath: config.output.publicPath,
        noInfo: true,
        stats: {
            colors: true
        }
    }).listen(8080, HOST, () => {
        console.log("Bundling project...");
    });
});

elixir((mix) => {
    mix.sass("./resources/assets/admin/sass/admin.scss")
        .sass("./resources/assets/app/sass/app.scss")
        .copy("./node_modules/materialize-css/fonts/roboto", "./public/fonts/roboto");

    gulp.start("app-config", "webpack-dev-server");

    mix.browserSync({
        proxy: `http://${HOST}:8080`
    });
});
