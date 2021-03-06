var webpack = require("webpack");

module.exports = {
    entry: {
        admin: "./resources/assets/admin/js/admin.js",
        app: "./resources/assets/app/js/app.js"
    },
    output: {
        path: __dirname + "/public/build",
        filename: "[name].bundle.js",
        publicPath: "/build/"
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                loader: "babel"
            },
            {
                test: /\.vue$/,
                loader: "vue"
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            "window.$": "jquery",
            "window.jQuery": "jquery"
        })
    ]
};
