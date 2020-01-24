/*
 |--------------------------------------------------------------------------
 | Custom Webpack Config
 |--------------------------------------------------------------------------
 |
 | Custom Webpack Config for Angular
 |
 */

let mix = require("laravel-mix");
let path = require("path");
let webpack = require("webpack");

mix.webpackConfig({
    resolve: {
        extensions: [".ts"]
    },

    module: {
        rules: [{
                test: /\.ts$/,
                loader: "ts-loader"
            },
            {
                test: /[\/\\]@angular[\/\\]core[\/\\].+\.js$/,
                parser: { system: false }
            }
        ]
    },

    plugins: [
        new webpack.ContextReplacementPlugin(
            /\@angular(\\|\/)core(\\|\/)esm5/,
            path.join(__dirname, "./client")
        )
    ]
});